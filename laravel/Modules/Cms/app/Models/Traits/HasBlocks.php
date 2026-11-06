<?php

declare(strict_types=1);

namespace Modules\Cms\Models\Traits;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\ModelNotFoundException;
<<<<<<< .merge_file_tqGi4K
use Illuminate\Database\MultipleRecordsFoundException;
=======
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_jtmCXU
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Cms\Datas\BlockData;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 6ed19256f (.)

use function Safe\preg_match;
use function Safe\preg_replace_callback;

/**
 * Trait for Models that have blocks.
 *
 * @phpstan-require-extends Model
 *
 * @method        mixed                                         getTranslation(string $key, string $locale, bool $useFallbackLocale = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static> query()
 */
trait HasBlocks
{
    /**
<<<<<<< HEAD
     * @return array<string, BlockData>
     */
    public function getBlocks(?string $side = null): array
    {
        $field = 'blocks';
        if ($side) {
            $field = $side.'_blocks';
        }
        $blocks = $this->{$field};

        // Handle translatable fields: if blocks is an array with locale keys,
        // extract the current language's content
        if (is_array($blocks)) {
            $primary_lang = XotData::make()->primary_lang;
            // Check if this looks like a translatable structure (has locale keys)
            $localeKeys = ['it', 'en', 'fr', 'de', 'es', $primary_lang];
            $hasLocaleKeys = count(array_intersect(array_keys($blocks), $localeKeys)) > 0;
            if ($hasLocaleKeys) {
                $locale = app()->getLocale();
                $blocks = $this->getTranslation($field, $locale, false);
                if (! is_array($blocks) && $locale !== $primary_lang) {
                    $blocks = $this->getTranslation($field, $primary_lang, false);
                }
            }
        }

        if (! is_array($blocks)) {
            $primary_lang = XotData::make()->primary_lang;
            $blocks = $this->getTranslation($field, $primary_lang);
=======
     * @return DataCollection<BlockData>
     */
    public function getBlocks(): DataCollection
    {
        $blocks = $this->blocks;

        if (! is_array($blocks)) {
            $primary_lang = XotData::make()->primary_lang;
            $blocks = $this->getTranslation('blocks', $primary_lang);
>>>>>>> 6ed19256f (.)
        }

        if (! is_array($blocks)) {
            $blocks = [];
        }

        $blocks = $this->compile($blocks);

<<<<<<< HEAD
        // Create BlockData instances manually to ensure constructor is called
        // This is necessary because Laravel Data's collect() doesn't call custom constructors
        // which is needed for dynamic query resolution
        $blockDataInstances = [];
        foreach ($blocks as $key => $block) {
            if (! is_array($block)) {
                continue;
            }
            $rawType = $block['type'] ?? 'unknown';
            $type = is_string($rawType) ? $rawType : 'unknown';
            /** @var array<string, mixed> $data */
            $data = (array) ($block['data'] ?? []);
            $rawSlug = $block['slug'] ?? null;
            $slug = is_string($rawSlug) ? $rawSlug : null;
            $active = (bool) ($block['active'] ?? true);

            $blockDataInstances[(string) $key] = new BlockData($type, $data, $slug, $active);
        }

        /* @var array<string, BlockData> $blockDataInstances */

        // Return array directly to ensure BlockData constructor is called for dynamic query resolution
        return $blockDataInstances;
=======
        /* @var DataCollection<BlockData> $collection */
        return BlockData::collection($blocks);
>>>>>>> 6ed19256f (.)
    }

    /**
     * @param array<int|string, mixed> $blocks
     *
     * @return array<string, mixed>
     */
    public function compile(array $blocks): array
    {
        $result = [];

        foreach ($blocks as $key => $value) {
            if (! is_string($key)) {
                $key = (string) $key;
            }

            if (is_string($value) && Str::containsAll($value, ['{{', '}}'])) {
                $result[$key] = $this->renderAllowedExpressions($value);
            } else {
                $result[$key] = $value;
            }
<<<<<<< HEAD
            if (is_array($value)) {
                $result[$key] = $this->compile($value);
            }
=======
>>>>>>> 6ed19256f (.)
        }

        return $result;
    }

    /**
<<<<<<< .merge_file_tqGi4K
     * Unico PHP ammesso nei blocchi: `route(...)` Folio (es. container0.view).
     * Vietato `LaravelLocalization::localizeURL` (religione FO — Fixcity
     * frontoffice-link-conventions). Ogni altra espressione resta testo
     * (Filament Blueprint C-3).
     */
    private const string SAFE_EXPRESSION = '/^route\((?:\s*(?:\'[^\'\\\\$@{}]*\'|"[^"\\\\$@{}]*"|\[|\]|,|=>))*\s*\)$/';

    private function renderAllowedExpressions(string $value): string
    {
        return (string) preg_replace_callback(
            '/\{\{\s*(.+?)\s*\}\}/s',
            function (array $match): string {
                /** @var array<int, string> $match */
                if (1 === preg_match(self::SAFE_EXPRESSION, $match[1])) {
                    return Blade::render($match[0]);
                }

                Log::warning('Espressione non ammessa in un blocco CMS, lasciata come testo.', ['expression' => $match[1]]);

                return $match[0];
            },
            $value,
        );
    }

    /**
=======
<<<<<<< HEAD
>>>>>>> .merge_file_jtmCXU
     * Get blocks by slug for a specific side.
     *
     * Cercato il record per slug, itera sui blocchi e filtra per side quando fornito.
     * Struttura attesa: blocks = [{type, data, slug?, side?}, ...]
     *
     * @param string      $slug The section/page slug
     * @param string|null $side The side to get blocks for (null for all blocks)
     *
     * @return array<string, BlockData>
     */
    public static function getBlocksBySlug(string $slug, ?string $side = null): array
    {
        $query = static::query()->where('slug', $slug);


        try {
            $record = $query->sole();
        } catch (MultipleRecordsFoundException $e) {
            $duplicates = $query->clone()->limit(10)->get(['id', 'slug']);
            $formatValue = static fn (mixed $value): string => match (true) {
                is_string($value) => $value,
                is_int($value), is_float($value), is_bool($value) => (string) $value,
                default => get_debug_type($value),
            };
            $records = $duplicates
                ->map(static function (Model $model) use ($formatValue): string {
                    return sprintf(
                        'id=%s slug=%s',
                        $formatValue($model->getAttribute('id')),
                        $formatValue($model->getAttribute('slug')),
                    );
                })
                ->implode(', ');

            throw new \RuntimeException(sprintf('CMS content collision: %s matched %d records for slug [%s], side [%s]. Records: %s. Expected one JSON content record per slug.', static::class, $e->getCount(), $slug, $side ?? 'content', $records), previous: $e);
        } catch (ModelNotFoundException) {
            return [];
        }

        if (! $record instanceof Model) {
            return [];
=======
     * Get blocks for a record by slug.
     *
     * @return DataCollection<BlockData>
     */
    public static function getBlocksBySlug(string $slug): DataCollection
    {
        // This trait requires the class to extend Model (@phpstan-require-extends Model)
        // So we can safely use static methods
        $query = static::where('slug', $slug);

        if (! method_exists($query, 'first')) {
            return BlockData::collection([]);
        }

        $record = $query->first();
        if (! $record instanceof Model) {
            return BlockData::collection([]);
>>>>>>> 6ed19256f (.)
        }

        // Check if getBlocks method exists
        if (! method_exists($record, 'getBlocks')) {
<<<<<<< HEAD
            return [];
        }

        /** @var array<string, BlockData> $blocks */
        $blocks = $record->getBlocks($side);
=======
            return BlockData::collection([]);
        }

        /** @var DataCollection<BlockData> $blocks */
        $blocks = $record->getBlocks();
>>>>>>> 6ed19256f (.)

        return $blocks;
    }
}
