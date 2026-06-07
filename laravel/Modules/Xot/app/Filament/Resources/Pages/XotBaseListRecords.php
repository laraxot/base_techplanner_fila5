<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Actions\Action;
<<<<<<< HEAD
=======
use Filament\Actions\ActionGroup;
use Filament\Actions\CreateAction;
>>>>>>> dev
use Filament\Resources\Pages\ListRecords as FilamentListRecords;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\Xot\Actions\ModelClass\UpdateCountAction;
use Modules\Xot\Filament\Traits\HasXotTable;
use Webmozart\Assert\Assert;

/**
 * Base class for list records pages.
 *
<<<<<<< HEAD
 * @property ?string $model
 * @property ?string $resource
 * @property ?string $slug
=======
 * @property ?string         $model
 * @property ?string         $resource
 * @property ?string         $slug
>>>>>>> dev
 * @property TableLayoutEnum $layoutView
 */
abstract class XotBaseListRecords extends FilamentListRecords
{
    use HasXotTable;

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    /**
     * Get the resource class name.
     *
     * @return class-string
     */
    public static function getResource(): string
    {
        $resource = Str::of(static::class)->before('\\Pages\\')->toString();
        Assert::classExists($resource);

        return $resource;
    }

    /*
     * Get the table columns.
     *
     * @return array<string, Tables\Columns\Column>
     *
     * abstract public function getTableColumns(): array;
     */

    /**
     * Get the default sort column and direction.
     *
     * @return array{id: 'desc'|'asc'}
     */
    protected function getDefaultSort(): array
    {
        return ['id' => 'desc'];
    }
<<<<<<< HEAD
<<<<<<< HEAD
    
    /**
     * Get the header actions.
     *
     * @return array<string, Action|\Filament\Actions\ActionGroup>
     *
     * @phpstan-ignore method.childReturnType
=======
=======
>>>>>>> dev

    /**
     * Get the header actions.
     *
<<<<<<< HEAD
     * @return array<string, Action>
>>>>>>> 4b6b99016 (first commit)
=======
     * @return array<string, Action|ActionGroup>
     *
     * @phpstan-ignore method.childReturnType
>>>>>>> dev
     */
    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            'create' => \Filament\Actions\CreateAction::make()->icon('heroicon-o-plus'),
=======
            // \Filament\Actions\CreateAction::make(),
            // ExportXlsAction::make('export_xls'),
>>>>>>> 4b6b99016 (first commit)
=======
            'create' => CreateAction::make()->icon('heroicon-o-plus'),
>>>>>>> dev
        ];
    }

    /**
     * Paginate the table query.
     */
<<<<<<< HEAD
    protected function paginateTableQuery(Builder $query): Paginator
    {
        $paginator = $query->fastPaginate(
            $this->getTableRecordsPerPage() === 'all' ? $query->count() : $this->getTableRecordsPerPage(),
        );
=======
    protected function paginateTableQueryOLD(Builder $query): Paginator
    {
        $perPage = $this->getTableRecordsPerPage();
        $perPageValue = 'all' === $perPage ? $query->count() : (is_numeric($perPage) ? (int) $perPage : null);

        $paginator = $query->paginate($perPageValue);
>>>>>>> dev

        Assert::isInstanceOf($paginator, Paginator::class);

        if (! method_exists($paginator, 'total')) {
            return $paginator;
        }

        $totalResult = $paginator->total();
        $count = is_int($totalResult) ? $totalResult : (is_numeric($totalResult) ? (int) $totalResult : 0);
        $modelClass = $this->getModel();
        // dddx($modelClass);
        app(UpdateCountAction::class)->execute($modelClass, $count);

        return $paginator;
    }
}
