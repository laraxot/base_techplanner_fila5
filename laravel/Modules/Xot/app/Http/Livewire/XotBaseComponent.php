<?php

declare(strict_types=1);

namespace Modules\Xot\Http\Livewire;

// use Illuminate\Support\Carbon;
<<<<<<< HEAD
use Exception;
use Illuminate\Contracts\Support\Renderable;
=======
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
>>>>>>> dev
use Illuminate\Support\Str;
use Livewire\Component;

/**
 * Class XotBaseComponent.
 */
abstract class XotBaseComponent extends Component
{
    /**
     * Undocumented function.
     *
     * @return view-string
     */
    public function getView(): string
    {
        $class = static::class;
        $module_name = Str::between($class, 'Modules\\', '\Http\\');
        $module_name_low = Str::lower($module_name);
        $comp_name = Str::after($class, '\Http\Livewire\\');
        $comp_name = str_replace('\\', '.', $comp_name);
        $comp_name = Str::snake($comp_name);

        $view = $module_name_low.'::livewire.'.$comp_name;
        $view = str_replace('._', '.', $view);
        // fare distinzione fra inAdmin o no ?
        if (! view()->exists($view)) {
<<<<<<< HEAD
            throw new Exception('View not Exists['.$view.']');
=======
            throw new \Exception('View not Exists['.$view.']');
>>>>>>> dev
        }

        return $view;
    }

    /**
<<<<<<< HEAD
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
=======
     * @return Application|Factory|View
>>>>>>> dev
     */
    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        // per fare copia ed incolla
        $view = $this->getView();
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
