<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget as FilamentWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Base per widget FO/pannello che rendono un Infolist Filament v5 (schema unificato).
 *
 * Le sottoclassi forniscono record + componenti; la vista default espone {{ $this->infolist }}.
 */
abstract class XotBaseInfolistWidget extends FilamentWidget implements HasSchemas
{
    use InteractsWithSchemas;
    use TransTrait;

    protected string $view = 'xot::filament.widgets.infolist';

    protected int|string|array $columnSpan = 'full';

    public function __construct()
    {
        $this->resolveView();
    }

    /**
     * @return array<int|string, Component|Htmlable|string>
     */
    abstract protected function getInfolistSchema(): array;

    abstract protected function getInfolistRecord(): ?Model;

    public function infolist(Schema $schema): Schema
    {
        $record = $this->getInfolistRecord();
        if ($record !== null) {
            $schema->record($record);
        }

        return $schema->components($this->getInfolistSchema());
    }

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }

    private function resolveView(): void
    {
        $defaultView = 'xot::filament.widgets.infolist';
        $usingDefaultView = $this->view === $defaultView;

        if (! $usingDefaultView && view()->exists($this->view)) {
            return;
        }

        try {
            $view = app(GetViewByClassAction::class)->execute(static::class);
            if (view()->exists($view)) {
                $this->view = $view;
            }
        } catch (\Exception $e) {
            if ($usingDefaultView) {
                throw $e;
            }
        }
    }
}
