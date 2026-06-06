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
     * Vista predefinita per widget che estendono XotBaseWidget.
     * Deve essere sovrascritta nelle classi figlie.
     */
    protected string $view = 'xot::filament.widgets.base';

    protected int|string|array $columnSpan = 'full';

    public function __construct()
    {
        $this->resolveView();
    }

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
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
