<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\RelationManagers;

<<<<<<< HEAD
use Filament\Actions\AttachAction;
=======
use Filament\Actions\Action;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkAction;
>>>>>>> dev
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager as FilamentRelationManager;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Layout\Component as LayoutComponent;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Modules\Xot\Filament\Traits\HasXotTable;
<<<<<<< HEAD
use Override;
=======
>>>>>>> dev
use stdClass;
use Webmozart\Assert\Assert;

/**
 * @property class-string<Model> $resource
 */
abstract class XotBaseRelationManager extends FilamentRelationManager
{
    use HasXotTable;

    protected static string $relationship = '';

    /** @var class-string<XotBaseResource> */
    protected static string $resource;

    /**
     * Resolve the parent Resource class for this RelationManager.
     *
     * @return class-string<XotBaseResource>
     */
    public function getResource(): string
    {
<<<<<<< HEAD
        if (isset(static::$resource) && \is_string(static::$resource) && static::$resource !== '') {
=======
        if (isset(static::$resource) && \is_string(static::$resource) && '' !== static::$resource) {
>>>>>>> dev
            return static::$resource;
        }

        $relationManagerClass = static::class;

        // Expect namespace like: Modules\\{Module}\\Filament\\Resources\\{ResourceName}\\RelationManagers\\{This}
        $parts = explode('\\', $relationManagerClass);
        $resourcesIndex = array_search('Resources', $parts, true);

        Assert::integer($resourcesIndex, 'Unable to locate Resources segment in class: '.$relationManagerClass);

        // Build resource class parts: Modules\\{Module}\\Filament\\Resources\\{ResourceName}
        $resourceParts = \array_slice($parts, 0, $resourcesIndex + 2);
        $resource = implode('\\', $resourceParts);

        Assert::true(class_exists($resource), 'Resource class does not exist: '.$resource);
        Assert::true(is_subclass_of($resource, XotBaseResource::class), 'Resource must extend XotBaseResource: '.$resource);

<<<<<<< HEAD
        /** @var class-string<XotBaseResource> $resource */
=======
        /* @var class-string<XotBaseResource> $resource */
>>>>>>> dev
        static::$resource = $resource;

        return static::$resource;
    }

    public static function getModuleName(): string
    {
        $class = static::class;
        $arr = explode('\\', $class);

        return $arr[1];
    }

    final public function form(Schema $schema): Schema
    {
        /** @var array<string, Component> $formSchema */
        $formSchema = $this->getFormSchema();

        // Cast to Htmlable|string to match Schema::components() signature
        // Component implements Htmlable, so this is type-safe
        /** @var array<string, Htmlable|string> $components */
        $components = $formSchema;

        return $schema->components($components);
    }

    public function getFormSchema(): array
    {
        return $this->getResource()::getFormSchema();
    }

    /**
     * @return array<int|string, Column|LayoutComponent>
     */
<<<<<<< HEAD
    #[Override]
<<<<<<< HEAD
    protected function getTableColumns(): array
=======
    public function getTableColumns(): array
>>>>>>> 4b6b99016 (first commit)
=======
    #[\Override]
    protected function getTableColumns(): array
>>>>>>> dev
    {
        $index = Arr::get($this->getResource()::getPages(), 'index');
        if (! $index) {
            // throw new \Exception('Index page not found');
            return [];
        }

        if (! \is_object($index) || ! method_exists($index, 'getPage')) {
            return [];
        }

        $index_page = $index->getPage();

        if (! \is_object($index_page) && ! \is_string($index_page)) {
            return [];
        }

        if (! method_exists($index_page, 'getTableColumns')) {
            // throw new \Exception('method  getTableColumns on '.print_r($index_page,true).' not found');
            return [];
        }

        $instance = \is_string($index_page) ? app($index_page) : $index_page;
        if (! \is_object($instance) || ! method_exists($instance, 'getTableColumns')) {
            return [];
        }

        $res = $instance->getTableColumns();

        if (! \is_array($res)) {
            return [];
        }

        // Ensure string keys always
        /** @var array<string, Column|LayoutComponent> $assoc */
        $assoc = [];
        foreach ($res as $key => $column) {
            // Verifica che $column sia del tipo corretto
            if (! ($column instanceof Column) && ! ($column instanceof LayoutComponent)) {
                continue;
            }

            if (\is_string($key)) {
                $assoc[$key] = $column;

                continue;
            }

            // $column è già verificato come instance di Column|LayoutComponent sopra
            $name = method_exists($column, 'getName') ? $column->getName() : (string) spl_object_hash($column);
            $nameStr = \is_string($name) ? $name : (string) $name;
            $assoc[$nameStr] = $column;
        }

        return $assoc;
    }

    // */
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    /**
     * Get table actions.
     *
     * CRITICO: Deve essere PUBLIC perché Filament\Tables\Concerns\InteractsWithTable
     * richiede che questo metodo sia pubblico.
     *
<<<<<<< HEAD
     * @return array<string, \Filament\Actions\Action>
     */
=======
>>>>>>> 4b6b99016 (first commit)
=======
     * @return array<string, Action>
     */
>>>>>>> dev
    public function getTableActions(): array
    {
        $actions = [];
        $me = $this;
        $actions['edit'] = EditAction::make()
            ->iconButton()
            ->visible(static function (?Model $record) use ($me): bool {
<<<<<<< HEAD
                if ($record === null) {
=======
                if (null === $record) {
>>>>>>> dev
                    return false;
                }

                return $me->canEdit($record);
            });

        $actions['detach'] = DetachAction::make()
            ->iconButton()
            ->visible(static function (?Model $record) use ($me): bool {
<<<<<<< HEAD
                if ($record === null) {
=======
                if (null === $record) {
>>>>>>> dev
                    return false;
                }

                return $me->canDetach($record);
            });

        return $actions;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    /**
     * Get table bulk actions.
     *
     * CRITICO: Deve essere PUBLIC per Filament InteractsWithTable.
     *
<<<<<<< HEAD
     * @return array<string, \Filament\Actions\BulkAction>
     */
=======
>>>>>>> 4b6b99016 (first commit)
=======
     * @return array<string, BulkAction>
     */
>>>>>>> dev
    public function getTableBulkActions(): array
    {
        $actions = [];

        $actions['delete_bulk'] = DeleteBulkAction::make()
            ->iconButton()
            ->visible(fn (?Model $record): bool => $this->canDeleteBulk($record));

        $actions['detach_bulk'] = DetachBulkAction::make()
            ->iconButton()
            ->visible(fn (?Model $record): bool => $this->canDetachBulk($record));

        return $actions;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
    /**
     * Get table header actions.
     *
     * CRITICO: Deve essere PUBLIC per Filament InteractsWithTable.
     *
<<<<<<< HEAD
     * @return array<string, \Filament\Actions\Action>
     */
=======
>>>>>>> 4b6b99016 (first commit)
=======
     * @return array<string, Action>
     */
>>>>>>> dev
    public function getTableHeaderActions(): array
    {
        $actions = [];
        $me = $this;
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($me, 'canAttach')) {
            $actions['attach'] = AttachAction::make()
                ->icon('heroicon-o-link')
                ->iconButton()
                ->tooltip(__('user::actions.attach.label'))
                ->visible(static fn (?Model $_record): bool => $me->canAttach());
        }
        // @phpstan-ignore function.alreadyNarrowedType
        if (method_exists($me, 'canCreate')) {
            $actions['create'] = CreateAction::make()
                ->icon('heroicon-o-plus')
                ->iconButton()
                ->tooltip(static::trans('actions.create.tooltip'))
                ->visible(static fn (?Model $_record): bool => $me->canCreate());
        }

        return $actions;
    }

    public function getTableFilters(): array
    {
        return [];
    }

    // public function getRelationship(): \Illuminate\Database\Eloquent\Relations\Relation|\Illuminate\Database\Eloquent\Builder
    // {
    //    return parent::getRelationship();
    // }

    /**
     * Determine if the bulk delete action can be performed on the given record.
     */
<<<<<<< HEAD
    public function canDeleteBulk(Model|stdClass|null $record): bool
    {
        if ($record instanceof stdClass) {
=======
    public function canDeleteBulk(Model|\stdClass|null $record): bool
    {
        if ($record instanceof \stdClass) {
>>>>>>> dev
            // For stdClass records (lightweight bulk operations), allow by default
            return true;
        }

        return true;
    }

    /**
     * Determine if the bulk detach action can be performed on the given record.
     */
<<<<<<< HEAD
    public function canDetachBulk(Model|stdClass|null $record): bool
    {
        if ($record instanceof stdClass) {
=======
    public function canDetachBulk(Model|\stdClass|null $record): bool
    {
        if ($record instanceof \stdClass) {
>>>>>>> dev
            // For stdClass records (lightweight bulk operations), allow by default
            return true;
        }

        return true;
    }
}
