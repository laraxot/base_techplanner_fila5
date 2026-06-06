<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Widgets\Widget as FilamentWidget;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Classe base astratta per tutti i widget Filament.
 * Widget generico: azioni, viste, traduzioni.
 *
 * @property string $title Titolo del widget
 * @property string $icon Icona del widget
 */
abstract class XotBaseWidget extends FilamentWidget implements HasActions
{
    use InteractsWithActions;
    use TransTrait;

    public string $title = '';

    public string $icon = '';

    /**
     * Lista degli eventi ascoltati dal widget.
     *
     * @var array<string, string>
     */
    public array $listener = [];

    /**

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

public function getWizardSubmitAction(): Action
    {
        /** @var view-string $submit_view */
        $submit_view = 'pub_theme::filament.wizard.submit-button';

        if (! view()->exists($submit_view)) {
            throw new \Exception("View {$submit_view} does not exist");
        }

        return Action::make('submit')
            ->label(__('filament-panels::resources/edit-record.form.actions.save.label'))
            ->submit('save')
            ->view((string) $submit_view);
    }

    /**
     * Ottiene le azioni del form.
     *
     * @return array<int|string, Action>
     */
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    /**
     * Ottiene il modello per il form.
     * Può essere sovrascritto nelle classi figlie per fornire un modello specifico.
     */
    protected function getFormModel(): Model|string|null
    {
        return null;
    }

    protected function getStepByName(string $name): Step
    {
        $schema = Str::of($name)
            ->snake()
            ->studly()
            ->prepend('get')
            ->append('Schema')
            ->toString();

        /** @var array<Htmlable|string> $schemaComponents */
        $schemaComponents = $this->$schema();

        return Step::make($name)->schema($schemaComponents);
    }
    private function resolveView(): void
    {
        $defaultView = 'xot::filament.widgets.base';

        if ($this->view !== $defaultView && view()->exists($this->view)) {
            return;
        }

        try {
            $view = app(GetViewByClassAction::class)->execute(static::class);
            if (view()->exists($view)) {
                $this->view = $view;
            }
        } catch (\Exception $e) {
            /* @phpstan-ignore identical.alwaysTrue */
            if ($this->view === $defaultView) {
                throw $e;
            }
        }
    }
}
