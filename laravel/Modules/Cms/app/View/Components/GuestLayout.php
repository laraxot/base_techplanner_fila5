<?php

declare(strict_types=1);

namespace Modules\Cms\View\Components;

<<<<<<< HEAD
use Closure;
use Illuminate\Contracts\Support\Htmlable;
=======
>>>>>>> 4b6b99016 (first commit)
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): View|Htmlable|Closure|string
    {
        /** @var string $view */
        $view = 'pub_theme::components.layouts.guest';

        return view($view);
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
>>>>>>> 4b6b99016 (first commit)
    }
}
