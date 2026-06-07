<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Pages;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Pages\Page;
// use Filament\Resources\Pages\Page;
=======
use Filament\Pages\Page as FilamentPage;
>>>>>>> 4b6b99016 (first commit)
=======
use Filament\Pages\Page;
// use Filament\Resources\Pages\Page;
>>>>>>> dev
use Filament\Schemas\Schema;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
<<<<<<< HEAD
use LogicException;
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Traits\TransTrait;
use RuntimeException;
use UnitEnum;

/**
<<<<<<< HEAD
 * Classe base astratta per tutte le pagine Filament *standalone* (non legate a risorse specifiche).
 * Fornisce funzionalità comuni e standardizzate per la gestione delle pagine personalizzate.
=======
 * Classe base astratta per tutte le pagine Filament non legate a risorse specifiche.
 * Fornisce funzionalità comuni e standardizzate per la gestione delle pagine.
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\Xot\Actions\View\GetViewByClassAction;
use Modules\Xot\Filament\Traits\TransTrait;

/**
 * Classe base astratta per tutte le pagine Filament *standalone* (non legate a risorse specifiche).
 * Fornisce funzionalità comuni e standardizzate per la gestione delle pagine personalizzate.
>>>>>>> dev
 *
 * Implementa:
 * - Sistema di traduzioni integrato
 * - Gestione autorizzazioni
 * - Integrazione con form
 * - Rilevamento intelligente modello
 * - Metodi helper comuni
 *
<<<<<<< HEAD
 * @property ?string $model Il modello associato alla pagina
 * @property array<string, mixed> $data I dati del form
 *
 * @see \Modules\Xot\docs\xotbasepage_implementation.md Documentazione completa
 */
<<<<<<< HEAD
abstract class XotBasePage extends Page implements HasForms
=======
abstract class XotBasePage extends FilamentPage implements HasForms
>>>>>>> 4b6b99016 (first commit)
=======
 * @property ?string              $model Il modello associato alla pagina
 * @property array<string, mixed> $data  I dati del form
 *
 * @see \Modules\Xot\docs\xotbasepage_implementation.md Documentazione completa
 */
abstract class XotBasePage extends Page implements HasForms
>>>>>>> dev
{
    use InteractsWithForms;
    use TransTrait;

    /**
     * Modello associato alla pagina.
     * Se non specificato, verrà dedotto automaticamente dal nome della classe.
     *
     * @var class-string<Model>|null
     */
    public static ?string $model = null;

    /**
     * Dati del form.
     * Contiene i dati del form durante la gestione della pagina.
     *
     * @var array<string, mixed>
     */
    public array $data = [];

    /**
     * Vista predefinita per la pagina.
     * Deve essere sovrascritta nelle classi figlie.
     */
    protected string $view = '';

    /**
     * Cache timeout per operazioni di cache (in secondi).
     */
    protected static int $cacheTimeout = 3600;

    /**
     * Ottiene il nome del modulo dalla classe.
     * Estrae il nome del modulo dal namespace della classe.
     *
     * @return string Il nome del modulo (es. '<main module>', 'User', ecc.)
     */
    public static function getModuleName(): string
    {
        $namespace = static::class;
        $moduleName = Str::between($namespace, 'Modules\\', '\\Filament');

<<<<<<< HEAD
        if ($moduleName === '') {
            throw new LogicException(sprintf('Cannot extract module name from class %s', static::class));
=======
        if ('' === $moduleName) {
            throw new \LogicException(sprintf('Cannot extract module name from class %s', static::class));
>>>>>>> dev
        }

        return $moduleName;
    }

    /**
     * Ottiene l'etichetta plurale del modello.
     *
     * @return string L'etichetta plurale del modello
     */
    public static function getPluralModelLabel(): string
    {
        return static::trans('plural_label');
    }

    /**
     * Ottiene il gruppo di navigazione.
     *
<<<<<<< HEAD
     * @return UnitEnum|string|null Il gruppo di navigazione
     */
    public static function getNavigationGroup(): UnitEnum|string|null
=======
     * @return \UnitEnum|string|null Il gruppo di navigazione
     */
    public static function getNavigationGroup(): \UnitEnum|string|null
>>>>>>> dev
    {
        return static::transFunc(__FUNCTION__);
    }

    /**
     * Ottiene il modello associato alla pagina.
     * Se non specificato esplicitamente, tenta di dedurlo dal nome della classe.
     *
     * @return class-string<Model> Il namespace completo della classe del modello
     */
    public function getModel(): string
    {
<<<<<<< HEAD
        /** @phpstan-ignore property.staticAccess */
        if (static::$model !== null) {
=======
        /* @phpstan-ignore property.staticAccess */
        if (null !== static::$model) {
>>>>>>> dev
            /** @phpstan-ignore property.staticAccess */
            /** @var class-string<Model> $modelValue */
            $modelValue = static::$model;

            return $modelValue;
        }

        $moduleName = static::getModuleName();
        $className = class_basename(static::class);

        // Rimuove suffissi comuni per ottenere il nome del modello
        $modelName = Str::of($className)
            ->before('Resource')
            ->before('Page')
            ->before('Dashboard')
            ->before('Report')
            ->trim()
            ->toString();

<<<<<<< HEAD
        if ($modelName === '') {
            throw new LogicException(sprintf('Cannot determine model name from class %s', static::class));
=======
        if ('' === $modelName) {
            throw new \LogicException(sprintf('Cannot determine model name from class %s', static::class));
>>>>>>> dev
        }

        $modelNamespace = 'Modules\\'.$moduleName.'\\Models\\'.$modelName;

        // Verifica che la classe del modello esista
<<<<<<< HEAD
        if (! class_exists($modelNamespace)) {
            throw new LogicException("Model class {$modelNamespace} does not exist");
        }

        /** @var class-string<Model> $modelNamespace */
=======
        if (! class_exists($modelNamespace) || ! is_subclass_of($modelNamespace, Model::class)) {
            throw new \LogicException("Model class {$modelNamespace} does not exist");
        }

        /* @var class-string<Model> $modelNamespace */
>>>>>>> dev
        return $modelNamespace;
    }

    /**
     * Configura il form della pagina.
     * Imposta lo schema e il percorso dello stato per il form.
     *
<<<<<<< HEAD
     * @param  \Filament\Schemas\Schema  $schema  Il form da configurare
     * @return \Filament\Schemas\Schema Lo schema configurato
=======
     * @param Schema $schema Il form da configurare
     *
     * @return Schema Lo schema configurato
>>>>>>> dev
     */
    public function schema(Schema $schema): Schema
    {
        $schema = $schema->components($this->getFormSchema());

        $schema->statePath('data');

        $debounce = $this->getAutosaveDebounce();
<<<<<<< HEAD
        if ($debounce !== null && method_exists($schema, 'autosaveDebounce')) {
=======
        if (null !== $debounce && method_exists($schema, 'autosaveDebounce')) {
>>>>>>> dev
            $schema->autosaveDebounce($debounce);
        }

        return $schema;
    }

    /**
     * Ottiene la vista associata alla pagina.
     *
     * @return string Il percorso della vista
     */
    public function getView(): string
    {
<<<<<<< HEAD
        if ($this->view === '') {
=======
        if ('' === $this->view) {
>>>>>>> dev
            $view = app(GetViewByClassAction::class)->execute(static::class);
            if (view()->exists($view)) {
                return (string) $view;
            }

            // Se non troviamo una vista, lanciamo un'eccezione
<<<<<<< HEAD
            throw new RuntimeException('Nessuna vista trovata per la classe: '.static::class);
=======
            throw new \RuntimeException('Nessuna vista trovata per la classe: '.static::class);
>>>>>>> dev
        }

        return $this->view;
    }

    /**
     * Ottiene il tempo di debounce per l'autosave in millisecondi.
     * Sovrascrivere nelle classi figlie per modificare questo valore.
     *
     * @return int|null Il tempo di debounce in millisecondi o null per disabilitare l'autosave
     */
    protected function getAutosaveDebounce(): ?int
    {
        return null; // Disabilitato per default
    }

    /**
     * Ottiene l'utente autenticato.
     * Verifica che l'utente sia un'istanza di Model per permettere aggiornamenti.
     *
<<<<<<< HEAD
     * @return Authenticatable&Model L'utente autenticato
     *
     * @throws RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
=======
     * @throws \RuntimeException Se l'utente non è autenticato o non è un'istanza di Model
     *
     * @return Authenticatable&Model L'utente autenticato
>>>>>>> dev
     */
    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

<<<<<<< HEAD
        if ($user === null) {
            throw new RuntimeException('Nessun utente autenticato trovato.');
        }

        if (! ($user instanceof Model)) {
            throw new RuntimeException(
                'L\'utente autenticato deve essere un modello Eloquent per permettere aggiornamenti.',
            );
        }

        /** @var Authenticatable&Model $user */
=======
        if (null === $user) {
            throw new \RuntimeException('Nessun utente autenticato trovato.');
        }

        if (! $user instanceof Model) {
            throw new \RuntimeException('L\'utente autenticato deve essere un modello Eloquent per permettere aggiornamenti.');
        }

        /* @var Authenticatable&Model $user */
>>>>>>> dev
        return $user;
    }

    /**
     * Verifica se l'utente ha l'accesso alla pagina.
     * Utilizza il sistema di autorizzazioni per controllare l'accesso.
     *
     * @throws AuthorizationException Se l'utente non è autorizzato
     */
    protected function authorizeAccess(): void
    {
        $this->authorize('view', static::class);
    }

    /**
     * Verifica se l'utente ha un permesso specifico.
     * Utile per controlli granulari all'interno delle pagine.
     *
<<<<<<< HEAD
     * @param  string  $permission  Il permesso da verificare
=======
     * @param string $permission Il permesso da verificare
     *
>>>>>>> dev
     * @return bool True se l'utente ha il permesso, false altrimenti
     */
    protected function hasPermissionTo(string $permission): bool
    {
        $user = $this->getUser();

        // @phpstan-ignore-next-line
        if (! method_exists($user, 'hasPermissionTo')) {
<<<<<<< HEAD
            throw new RuntimeException('Il modello utente deve implementare il metodo hasPermissionTo');
=======
            throw new \RuntimeException('Il modello utente deve implementare il metodo hasPermissionTo');
>>>>>>> dev
        }

        // Use method_exists to safely call hasPermissionTo
        return $user->hasPermissionTo($permission);
    }

    /**
     * Risolve il percorso della vista.
     *
<<<<<<< HEAD
     * @return string Il percorso della vista
     *
     * @throws RuntimeException Se la vista non esiste
=======
     * @throws \RuntimeException Se la vista non esiste
     *
     * @return string Il percorso della vista
>>>>>>> dev
     */
    protected function resolveViewPath(): string
    {
        $view = $this->getView();
        if (view()->exists($view)) {
            return $view;
        }

<<<<<<< HEAD
        throw new RuntimeException("View [{$view}] not found for page: ".static::class);
=======
        throw new \RuntimeException("View [{$view}] not found for page: ".static::class);
>>>>>>> dev
    }

    /**
     * Ottiene una query builder per il modello associato alla pagina.
     *
<<<<<<< HEAD
     * @return Builder<Model>
     *
     * @throws LogicException Se il modello non è definito
=======
     * @throws \LogicException Se il modello non è definito
     *
     * @return Builder<Model>
>>>>>>> dev
     */
    protected function getQuery(): Builder
    {
        $modelClass = $this->getModel();

        if (! class_exists($modelClass)) {
<<<<<<< HEAD
            throw new LogicException("Model class {$modelClass} does not exist");
        }

        /** @var class-string<Model> $modelClass */
        $instance = new $modelClass;
        if (! ($instance instanceof Model)) {
            throw new LogicException("Class {$modelClass} must extend Eloquent Model");
=======
            throw new \LogicException("Model class {$modelClass} does not exist");
        }

        /** @var class-string<Model> $modelClass */
        $instance = new $modelClass();
        if (! $instance instanceof Model) {
            throw new \LogicException("Class {$modelClass} must extend Eloquent Model");
>>>>>>> dev
        }

        return $modelClass::query();
    }

    /**
     * Invalida la cache per il modello specificato.
     *
<<<<<<< HEAD
     * @param  class-string<Model>|null  $modelClass
=======
     * @param class-string<Model>|null $modelClass
>>>>>>> dev
     */
    protected function invalidateCache(?string $modelClass = null, int|string|null $id = null): void
    {
        // Implementazione custom se necessaria
        // Per ora lasciamo vuoto, può essere implementato nelle classi figlie
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
<<<<<<< HEAD
<<<<<<< HEAD
                ->label(__('filament-panels::resources/edit-record.form.actions.save.label'))
=======
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
>>>>>>> 4b6b99016 (first commit)
=======
                ->label(__('filament-panels::resources/edit-record.form.actions.save.label'))
>>>>>>> dev
                ->submit('save'),
        ];
    }
}
