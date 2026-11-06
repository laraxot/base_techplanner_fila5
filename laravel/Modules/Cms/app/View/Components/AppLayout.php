<?php

declare(strict_types=1);

namespace Modules\Cms\View\Components;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Cms\Actions\View\GetCmsViewAction;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Factory|View
    {
<<<<<<< .merge_file_zyeRcF
        $view = app(GetCmsViewAction::class)->execute('pub_theme::components.layouts.app');
=======
        /*
         * $view = 'pub_theme';
         * if (inAdmin()) {
         * $view = 'adm_theme';
         * }
         *
         * $view .= '::components.app-layout';
         */
        $view = 'pub_theme::layouts.app';
        $view_params = [];
<<<<<<< HEAD
=======
        // @phpstan-ignore-next-line
        if (! view()->exists($view)) {
            throw new \Exception('view not found: '.$view);
        }
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_fySVDW

        return view($view);
    }
}
