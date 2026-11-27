<?php

declare(strict_types=1);

namespace Modules\Job\Http\Livewire\Schedule;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use InvalidArgumentException;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Modules\Job\Actions\Console\AssertAllowedArtisanCommandAction;
use Modules\Xot\Actions\GetViewAction;
use Modules\Xot\Filament\Traits\SuperAdminOnlyTrait;

/**
 * Pannello storico "Schedule Status": un pulsante per ogni comando di schedulazione, con l'output sotto.
 *
 * Codice ritirato (story 12.1, `Filament\Widgets\ScheduleStatusWidget` e' il suo gemello): resta solo finche'
 * `Http/Livewire` non viene cancellato per intero. Fino ad allora vale la stessa difesa dei gemelli Filament:
 * esegue solo comandi esposti dai pulsanti (match esatto, nessun argomento libero) e solo per il super-admin.
 *
 * Ogni proprieta' pubblica e' riscrivibile dal client: per questo `$out`, che la vista stampa come HTML grezzo,
 * e' `#[Locked]`, e non esistono altre proprieta' pubbliche.
 *
 * @see docs/wiki/rules/folio-volt-livewire.md (Livewire: proprieta' pubbliche e `#[Locked]`)
 * @see Modules/AI/docs/adr/0004-phpstan-zero-errori.md — `private const array COMMANDS` tipizzata
 *      (PHP 8.3): la lista comandi e' `array<string,string>` per PHPStan, non `array`
 */
class Status extends Component
{
    use SuperAdminOnlyTrait;

    /**
     * Comando => etichetta. `schedule:work` manca di proposito: non termina mai e bloccherebbe la richiesta HTTP.
     */
    private const array COMMANDS = [
        'job:schedule-list' => 'job:schedule-list',
        'schedule:clear-cache' => 'Delete the cached mutex files created by scheduler',
        'schedule:list' => 'List the scheduled commands',
        'schedule:run' => 'Run the scheduled commands',
        'schedule:test' => 'Run a scheduled command',
        'schedule-monitor:sync' => 'schedule-monitor:sync',
        'schedule-monitor:list' => 'schedule-monitor:list',
    ];

    /** Output dei comandi lanciati; lo scrive solo il server. */
    #[Locked]
    public string $out = '';

    public function render(): Renderable
    {
        return view(app(GetViewAction::class)->execute(), [
            'acts' => $this->getActs(),
        ]);
    }

    /**
     * Esegue solo i comandi esposti dai pulsanti.
     *
     * Le azioni pubbliche di un componente gia' montato sono richiamabili dal client anche se la vista non mostra
     * il pulsante: l'autorizzazione va quindi controllata qui, non solo all'apertura.
     *
     * @throws AuthorizationException se l'utente non e' super-admin
     */
    public function artisan(string $cmd): void
    {
        if (! static::canAccess()) {
            throw new AuthorizationException();
        }

        try {
            app(AssertAllowedArtisanCommandAction::class)->execute($cmd, $this->getAllowedCommands());
        } catch (InvalidArgumentException) {
            return;
        }

        $this->out .= '<hr/>';
        Artisan::call($cmd);
        $this->out .= e(Artisan::output());
        $this->out .= '<hr/>';
    }

    /**
     * @return array<int, object{name: string, label: string}>
     */
    protected function getActs(): array
    {
        $acts = [];
        foreach (self::COMMANDS as $name => $label) {
            $acts[] = (object) ['name' => $name, 'label' => $label];
        }

        return $acts;
    }

    /**
     * @return list<string>
     */
    protected function getAllowedCommands(): array
    {
        return array_keys(self::COMMANDS);
    }

    /**
     * @return Collection<int, Event>
     */
    protected function getScheduledJobs(): Collection
    {
        if (app()->runningInConsole()) {
            return new Collection();
        }

        // Dal Laravel 11 non c'e' piu' il Kernel con lo schedule: gli eventi li tiene `Schedule`.
        return collect(app(Schedule::class)->events())->values();
    }
}
