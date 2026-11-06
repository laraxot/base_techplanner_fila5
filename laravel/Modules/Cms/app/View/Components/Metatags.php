<?php

declare(strict_types=1);

namespace Modules\Cms\View\Components;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Component;
<<<<<<< .merge_file_d8zVZs
use Modules\Cms\Actions\BuildPageSchemaAction;
=======
<<<<<<< HEAD
use Modules\Cms\Support\PageSchemaBuilder;
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_z0bFWD
use Modules\Xot\Actions\GetViewAction;
use Modules\Xot\Datas\MetatagData;

class Metatags extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): ViewContract
    {
        $metatag = MetatagData::make();
        $view = app(GetViewAction::class)->execute();
<<<<<<< HEAD
        $route = request()->route();
        $routeName = $route ? $route->getName() : null;
        /** @var array<string, mixed> $routeParameters */
        $routeParameters = [];
        if (is_object($route)) {
            /** @var array<string, mixed> $tmpRouteParameters */
            $tmpRouteParameters = $route->parameters();
            $routeParameters = $tmpRouteParameters;
        }
        $path = request()->path();

        $authUser = auth()->user();
        $user = $authUser instanceof Authenticatable ? $authUser : null;
        $view_params = [
            'meta' => $metatag,
            'pageSchema' => app(BuildPageSchemaAction::class)->execute(
                meta: $metatag,
                routeName: $routeName,
                path: $path,
                routeParameters: $routeParameters,
                user: $user,
            ),
        ];
=======

        $view_params = [
            'meta' => $metatag,
        ];
        // @phpstan-ignore-next-line
>>>>>>> 6ed19256f (.)
        if (! view()->exists($view)) {
            throw new \Exception('view not found: '.$view);
        }

        return view($view, $view_params);
    }
}
