<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Builders;

use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\User\Models\User;

=======
use Modules\User\Models\User;
>>>>>>> 6ed19256f (.)
use function Safe\strtotime;

/**
 * Filter Builder for common Filament table filters.
 *
 * Provides standardized filter definitions to reduce code duplication
 * across List pages in all modules.
 *
 * Usage:
 * ```php
 * public function getTableFilters(): array
 * {
 *     return [
 *         FilterBuilder::activeToggle(),
 *         FilterBuilder::selectFromModel('category', Category::class),
 *     ];
 * }
 * ```
 */
class FilterBuilder
{
    /**
     * Active/Inactive ternary filter.
     */
    public static function activeToggle(string $column = 'is_active'): TernaryFilter
    {
        return TernaryFilter::make($column)
            ->label('Status')
            ->placeholder('All')
            ->trueLabel('Active')
            ->falseLabel('Inactive');
    }

    /**
     * Published/Unpublished ternary filter.
     */
    public static function publishedToggle(string $column = 'is_published'): TernaryFilter
    {
        return TernaryFilter::make($column)
            ->label('Published')
            ->placeholder('All')
            ->trueLabel('Published')
            ->falseLabel('Unpublished');
    }

    /**
     * Featured/Not Featured ternary filter.
     */
    public static function featuredToggle(string $column = 'is_featured'): TernaryFilter
    {
        return TernaryFilter::make($column)
            ->label('Featured')
            ->placeholder('All')
            ->trueLabel('Featured')
            ->falseLabel('Not Featured');
    }

    /**
     * Generic boolean ternary filter.
     */
    public static function booleanToggle(
        string $column,
        string $label,
        string $trueLabel = 'Yes',
<<<<<<< HEAD
        string $falseLabel = 'No',
=======
        string $falseLabel = 'No'
>>>>>>> 6ed19256f (.)
    ): TernaryFilter {
        return TernaryFilter::make($column)
            ->label($label)
            ->placeholder('All')
            ->trueLabel($trueLabel)
            ->falseLabel($falseLabel);
    }

    /**
     * Date range filter.
     */
    public static function dateRange(string $column = 'created_at', string $label = 'Date Range'): Filter
    {
        return Filter::make($column)
            ->schema([
                DatePicker::make('from')
                    ->label('From'),
                DatePicker::make('until')
                    ->label('Until'),
            ])
            ->query(function (Builder $query, array $data) use ($column): Builder {
                return $query
                    ->when(
                        $data['from'] ?? null,
                        fn (Builder $query, mixed $date): Builder => $query->whereDate($column, '>=', is_string($date) ? $date : (string) $date),
                    )
                    ->when(
                        $data['until'] ?? null,
                        fn (Builder $query, mixed $date): Builder => $query->whereDate($column, '<=', is_string($date) ? $date : (string) $date),
                    );
            })
            ->indicateUsing(function (array $data) use ($label): ?string {
                $from = $data['from'] ?? null;
                $until = $data['until'] ?? null;

                if (! $from && ! $until) {
                    return null;
                }

                if ($from && $until) {
                    $fromStr = is_string($from) ? $from : (string) $from;
                    $untilStr = is_string($until) ? $until : (string) $until;

                    return $label.': '.date('d/m/Y', strtotime($fromStr)).' - '.date('d/m/Y', strtotime($untilStr));
                }

                if ($from) {
                    $fromStr = is_string($from) ? $from : (string) $from;

                    return $label.' from: '.date('d/m/Y', strtotime($fromStr));
                }

                if ($until) {
                    $untilStr = is_string($until) ? $until : (string) $until;

                    return $label.' until: '.date('d/m/Y', strtotime($untilStr));
                }

                return null;
            });
    }

    /**
     * Created at date range filter.
     */
    public static function createdAtRange(): Filter
    {
        return self::dateRange('created_at', 'Created Date');
    }

    /**
     * Updated at date range filter.
     */
    public static function updatedAtRange(): Filter
    {
        return self::dateRange('updated_at', 'Updated Date');
    }

    /**
     * Published at date range filter.
     */
    public static function publishedAtRange(): Filter
    {
        return self::dateRange('published_at', 'Published Date');
    }

    /**
     * Select filter from model.
     *
<<<<<<< HEAD
     * @param class-string<Model> $modelClass
=======
     * @param  class-string<Model>  $modelClass
>>>>>>> 6ed19256f (.)
     */
    public static function selectFromModel(
        string $name,
        string $modelClass,
        string $labelColumn = 'name',
        string $valueColumn = 'id',
<<<<<<< HEAD
        ?string $relationshipName = null,
=======
        ?string $relationshipName = null
>>>>>>> 6ed19256f (.)
    ): SelectFilter {
        /** @var array<int|string, string> $options */
        $options = $modelClass::pluck($labelColumn, $valueColumn)->toArray();

        $filter = SelectFilter::make($name)
            ->options($options);

<<<<<<< HEAD
        if (null !== $relationshipName) {
=======
        if ($relationshipName !== null) {
>>>>>>> 6ed19256f (.)
            $filter->relationship($relationshipName, $labelColumn);
        }

        return $filter;
    }

    /**
     * Status select filter with common statuses.
     *
<<<<<<< HEAD
     * @param array<string, string> $customStatuses
=======
     * @param  array<string, string>  $customStatuses
>>>>>>> 6ed19256f (.)
     */
    public static function statusSelect(array $customStatuses = []): SelectFilter
    {
        $defaultStatuses = [
            'open' => 'Open',
            'in_progress' => 'In Progress',
            'resolved' => 'Resolved',
            'closed' => 'Closed',
        ];

        return SelectFilter::make('status')
            ->options(array_merge($defaultStatuses, $customStatuses));
    }

    /**
     * Priority select filter.
     *
<<<<<<< HEAD
     * @param array<string, string> $customPriorities
=======
     * @param  array<string, string>  $customPriorities
>>>>>>> 6ed19256f (.)
     */
    public static function prioritySelect(array $customPriorities = []): SelectFilter
    {
        $defaultPriorities = [
            'low' => 'Low',
            'medium' => 'Medium',
            'high' => 'High',
            'critical' => 'Critical',
        ];

        return SelectFilter::make('priority')
            ->options(array_merge($defaultPriorities, $customPriorities));
    }

    /**
     * Type select filter.
     *
<<<<<<< HEAD
     * @param array<string, string> $types
=======
     * @param  array<string, string>  $types
>>>>>>> 6ed19256f (.)
     */
    public static function typeSelect(array $types): SelectFilter
    {
        return SelectFilter::make('type')
            ->options($types);
    }

    /**
     * Category select filter.
     *
<<<<<<< HEAD
     * @param class-string<Model> $categoryModel
=======
     * @param  class-string<Model>  $categoryModel
>>>>>>> 6ed19256f (.)
     */
    public static function categorySelect(string $categoryModel, string $labelColumn = 'name'): SelectFilter
    {
        return self::selectFromModel('category', $categoryModel, $labelColumn, 'id', 'category');
    }

    /**
     * User/Author select filter.
     *
<<<<<<< HEAD
     * @param class-string<Model> $userModel
=======
     * @param  class-string<Model>  $userModel
>>>>>>> 6ed19256f (.)
     */
    public static function userSelect(
        string $name = 'user',
        string $userModel = User::class,
<<<<<<< HEAD
        string $labelColumn = 'name',
=======
        string $labelColumn = 'name'
>>>>>>> 6ed19256f (.)
    ): SelectFilter {
        return self::selectFromModel($name, $userModel, $labelColumn, 'id', $name);
    }

    /**
     * Trashed filter (for SoftDeletes).
<<<<<<< HEAD
=======
     *
     * Note: This filter assumes the model uses SoftDeletes trait.
     * PHPStan may not recognize withTrashed/onlyTrashed methods on base Builder.
     *
     * @phpstan-ignore-next-line
>>>>>>> 6ed19256f (.)
     */
    public static function trashedFilter(): TernaryFilter
    {
        return TernaryFilter::make('trashed')
            ->label('Deleted')
            ->placeholder('Without trashed')
            ->trueLabel('Only trashed')
            ->falseLabel('Without trashed')
            ->queries(
<<<<<<< HEAD
                true: fn (Builder $query): Builder => self::applyTrashedQuery($query, 'only'),
                false: fn (Builder $query): Builder => self::applyTrashedQuery($query, 'without'),
                blank: fn (Builder $query): Builder => self::applyTrashedQuery($query, 'with'),
            );
    }

    private static function modelUsesSoftDeletes(Builder $query): bool
    {
        return in_array(SoftDeletes::class, class_uses_recursive($query->getModel()), true);
    }

    private static function applyTrashedQuery(Builder $query, string $mode): Builder
    {
        if (! self::modelUsesSoftDeletes($query)) {
            return $query;
        }

        $column = $query->getModel()->qualifyColumn('deleted_at');
        $query = $query->withoutGlobalScope(SoftDeletingScope::class);

        return match ($mode) {
            'only' => $query->whereNotNull($column),
            'without' => $query->whereNull($column),
            default => $query,
        };
    }
=======
                /** @phpstan-ignore-next-line */
                true: fn (Builder $query) => $query->onlyTrashed(),
                /** @phpstan-ignore-next-line */
                false: fn (Builder $query) => $query->withoutTrashed(),
                /** @phpstan-ignore-next-line */
                blank: fn (Builder $query) => $query->withTrashed(),
            );
    }
>>>>>>> 6ed19256f (.)
}
