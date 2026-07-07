<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

use Filament\Actions\Action;
<<<<<<< HEAD
use Filament\Actions\ActionGroup;
use Filament\Actions\CreateAction;
=======
>>>>>>> 6ed19256f (.)
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
 * @property ?string         $model
 * @property ?string         $resource
 * @property ?string         $slug
=======
 * @property ?string $model
 * @property ?string $resource
 * @property ?string $slug
>>>>>>> 6ed19256f (.)
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

    /**
     * Get the header actions.
     *
<<<<<<< HEAD
     * @return array<string, Action|ActionGroup>
=======
     * @return array<string, Action>
>>>>>>> 6ed19256f (.)
     */
    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            'create' => CreateAction::make()->icon('heroicon-o-plus'),
=======
            // \Filament\Actions\CreateAction::make(),
            // ExportXlsAction::make('export_xls'),
>>>>>>> 6ed19256f (.)
        ];
    }

    /**
     * Paginate the table query.
     */
<<<<<<< HEAD
    protected function paginateTableQueryOLD(Builder $query): Paginator
    {
        $perPage = $this->getTableRecordsPerPage();
        $perPageValue = 'all' === $perPage ? $query->count() : (is_numeric($perPage) ? (int) $perPage : null);

        $paginator = $query->paginate($perPageValue);
=======
    protected function paginateTableQuery(Builder $query): Paginator
    {
        $paginator = $query->fastPaginate(
            $this->getTableRecordsPerPage() === 'all' ? $query->count() : $this->getTableRecordsPerPage(),
        );
>>>>>>> 6ed19256f (.)

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
