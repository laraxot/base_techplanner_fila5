<?php

declare(strict_types=1);

namespace Modules\Cms\Actions;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
>>>>>>> dev
use Modules\Cms\Datas\ResolvePageData;
use Modules\Cms\Models\Page as PageModel;
use Spatie\QueueableAction\QueueableAction;

/**
 * Class ResolvePageAction.
 *
 * Risolve il contenuto da renderizzare per le rotte Folio [container0]/[slug0].
 * Segue la logica di priorità:
 * 1. Tentativo di caricamento di un modello dinamico (es. Event).
 * 2. Verifica se esiste una pagina CMS con slug esatto (container.slug).
 * 3. Fallback a una pagina CMS generica (container.view).
 */
<<<<<<< HEAD
class ResolvePageAction
=======
final class ResolvePageAction
>>>>>>> dev
{
    use QueueableAction;

    public function execute(string $container0, string $slug0): ResolvePageData
    {
<<<<<<< HEAD
        // 1. Tenta il caricamento di un modello dinamico
=======
>>>>>>> dev
        $item = $this->loadDynamicModel($container0, $slug0);

        if (null !== $item) {
            return new ResolvePageData(
                renderMode: 'model',
                item: $item,
<<<<<<< HEAD
                pageSlug: '' // Non serve per il mode 'model'
            );
        }

        // 2. Verifica se esiste una pagina CMS con slug esatto
=======
                pageSlug: $container0.'.view'
            );
        }

>>>>>>> dev
        $fullSlug = $container0.'.'.$slug0;
        if (PageModel::where('slug', $fullSlug)->exists()) {
            return new ResolvePageData(
                renderMode: 'cms',
                item: null,
                pageSlug: $fullSlug
            );
        }

<<<<<<< HEAD
        // 3. Fallback a container.view
=======
>>>>>>> dev
        $viewSlug = $container0.'.view';
        if (PageModel::where('slug', $viewSlug)->exists()) {
            return new ResolvePageData(
                renderMode: 'cms',
                item: null,
                pageSlug: $viewSlug
            );
        }

<<<<<<< HEAD
        // 4. Fallback finale allo slug completo (mostrerà 404 o placeholder nel componente x-page)
=======
>>>>>>> dev
        return new ResolvePageData(
            renderMode: 'cms',
            item: null,
            pageSlug: $fullSlug
        );
    }

    private function loadDynamicModel(string $container0, string $slug0): ?object
    {
<<<<<<< HEAD
        // Mappature note (Priority 1)
=======
        if ('profile' === $container0) {
            return $this->resolvePublicProfileItem($slug0);
        }

>>>>>>> dev
        $knownMappings = [
            'events' => 'Modules\\Meetup\\Models\\Event',
        ];

        if (isset($knownMappings[$container0])) {
            $modelClass = $knownMappings[$container0];

            return $this->queryModel($modelClass, $slug0);
        }

<<<<<<< HEAD
        // Mappature da config (Priority 2)
=======
>>>>>>> dev
        $modelMap = config('xra.container0_model_map', []);
        if (is_array($modelMap) && isset($modelMap[$container0])) {
            $modelClass = $modelMap[$container0];
            if (is_string($modelClass)) {
                return $this->queryModel($modelClass, $slug0);
            }
        }

<<<<<<< HEAD
        // Convenzioni (Priority 3)
=======
>>>>>>> dev
        $singular = rtrim($container0, 's');
        $possibleModels = [
            'Modules\\'.ucfirst($container0).'\\Models\\'.ucfirst($singular),
            'App\\Models\\'.ucfirst($singular),
        ];

        foreach ($possibleModels as $modelClass) {
            $item = $this->queryModel($modelClass, $slug0);
            if (null !== $item) {
                return $item;
            }
        }

        return null;
    }

<<<<<<< HEAD
    private function queryModel(string $modelClass, string $slug): ?object
    {
        if (class_exists($modelClass) && method_exists($modelClass, 'where')) {
            /** @var \Illuminate\Database\Eloquent\Builder $query */
            $query = $modelClass::where('slug', $slug);

            return $query->first();
=======
    private function queryModel(string $modelClass, string $identifier): ?object
    {
        if (class_exists($modelClass) && is_subclass_of($modelClass, Model::class)) {
            /** @var Model $model */
            $model = app($modelClass);
            $candidateKeys = array_values(array_unique([
                $model->getRouteKeyName(),
                'slug',
                'id',
                'uuid',
                'user_id',
                'user_name',
            ]));

            foreach ($candidateKeys as $key) {
                foreach ($this->buildCandidateQueries($model) as $query) {
                    try {
                        $item = $query->where($key, $identifier)->first();
                    } catch (\Throwable) {
                        continue;
                    }

                    if (null !== $item) {
                        return $item;
                    }
                }
            }

            foreach ($candidateKeys as $key) {
                try {
                    $row = $model->getConnection()
                        ->table($model->getTable())
                        ->where($key, $identifier)
                        ->first();
                } catch (\Throwable) {
                    continue;
                }

                if (null !== $row) {
                    /** @var array<string, mixed> $attributes */
                    $attributes = (array) $row;

                    return $model->newFromBuilder($attributes);
                }
            }
        }

        return null;
    }

    /**
     * @return array<int, Builder<Model>>
     */
    private function buildCandidateQueries(Model $model): array
    {
        /** @var array<int, Builder<Model>> $queries */
        $queries = [$model->newQuery()];

        try {
            $queries[] = $model->newQueryWithoutScopes();
        } catch (\Throwable) {
        }

        if (in_array(SoftDeletes::class, class_uses_recursive($model), true)) {
            // Soft deleted records are already covered by the fallback DB query branch.
            return $queries;
        }

        return $queries;
    }

    private function resolvePublicProfileItem(string $identifier): ?object
    {
        $userClass = 'Modules\\User\\Models\\User';
        $user = $this->queryModel($userClass, $identifier);
        if (null !== $user) {
            return $user;
        }

        $profileClasses = [
            'Modules\\Meetup\\Models\\Profile',
            'Modules\\User\\Models\\Profile',
        ];

        foreach ($profileClasses as $profileClass) {
            $profile = $this->queryModel($profileClass, $identifier);
            if (null !== $profile) {
                return $profile;
            }
>>>>>>> dev
        }

        return null;
    }
}
