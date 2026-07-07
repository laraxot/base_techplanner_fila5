<?php

declare(strict_types=1);

namespace Modules\Cms\View\Components;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
=======
use Illuminate\Contracts\View\View;
>>>>>>> 6ed19256f (.)
use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): View|Htmlable|\Closure|string
    {
        /** @var view-string $view */
        $view = 'pub_theme::components.layouts.guest';

        return ViewFacade::make($view);
=======
    public function render(): View
    {
        $view = 'pub_theme::layouts.guest';
        $view_params = [];
        // @phpstan-ignore-next-line
        if (! view()->exists($view)) {
            throw new \Exception('view not found: '.$view);
        }

        return view($view, $view_params);
>>>>>>> 6ed19256f (.)
    }
}
