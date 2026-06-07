<?php

declare(strict_types=1);

namespace Modules\Cms\Models\Traits;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\ModelNotFoundException;
>>>>>>> dev
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Modules\Cms\Datas\BlockData;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

/**
 * Trait for Models that have blocks.
 *
 * @phpstan-require-extends Model
 */
trait HasBlocks
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
     * @return array<string, BlockData>
     */
    public function getBlocks(?string $side = null): array
    {
        $field = 'blocks';
        if ($side) {
            $field = $side.'_blocks';
        }
        $blocks = $this->{$field};

<<<<<<< HEAD
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
>>>>>>> 4b6b99016 (first commit)
=======
        // Handle translatable fields: if blocks is an array with locale keys,
        // extract the current language's content
        if (is_array($blocks)) {
            $primary_lang = XotData::make()->primary_lang;
            // Check if this looks like a translatable structure (has locale keys)
            $localeKeys = ['it', 'en', 'fr', 'de', 'es', $primary_lang];
            $hasLocaleKeys = count(array_intersect(array_keys($blocks), $localeKeys)) > 0;
            if ($hasLocaleKeys) {
                $blocks = $this->getTranslation($field, $primary_lang);
            }
        }

        if (! is_array($blocks)) {
            $primary_lang = XotData::make()->primary_lang;
            $blocks = $this->getTranslation($field, $primary_lang);
>>>>>>> dev
        }

        if (! is_array($blocks)) {
            $blocks = [];
        }

        $blocks = $this->compile($blocks);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        // Create BlockData instances manually to ensure constructor is called
        // This is necessary because Laravel Data's collect() doesn't call custom constructors
        // which is needed for dynamic query resolution
        $blockDataInstances = [];
        foreach ($blocks as $key => $block) {
            /** @var array<string, mixed> $block */
            $type = (string) ($block['type'] ?? 'unknown');
            $data = (array) ($block['data'] ?? []);
            $slug = isset($block['slug']) ? (string) $block['slug'] : null;
<<<<<<< HEAD

            $blockDataInstances[(string) $key] = new BlockData($type, $data, $slug);
=======
            $active = (bool) ($block['active'] ?? true);

            $blockDataInstances[(string) $key] = new BlockData($type, $data, $slug, $active);
>>>>>>> dev
        }

        /* @var array<string, BlockData> $blockDataInstances */

        // Return array directly to ensure BlockData constructor is called for dynamic query resolution
        return $blockDataInstances;
<<<<<<< HEAD
=======
        /* @var DataCollection<BlockData> $collection */
        return BlockData::collection($blocks);
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
    }

    /**
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
                $result[$key] = Blade::render($value);
            } else {
                $result[$key] = $value;
            }
<<<<<<< HEAD
<<<<<<< HEAD
            if (is_array($value)) {
                $result[$key] = $this->compile($value);
            }
=======
>>>>>>> 4b6b99016 (first commit)
=======
            if (is_array($value)) {
                $result[$key] = $this->compile($value);
            }
>>>>>>> dev
        }

        return $result;
    }

    /**
<<<<<<< HEAD
     * Get blocks for a record by slug.
     *
<<<<<<< HEAD
     * @return array<string, BlockData>
     */
    public static function getBlocksBySlug(string $slug, ?string $side = null): array
=======
     * @return DataCollection<BlockData>
     */
    public static function getBlocksBySlug(string $slug): DataCollection
>>>>>>> 4b6b99016 (first commit)
    {
        // This trait requires the class to extend Model (@phpstan-require-extends Model)
        // So we can safely use static methods
        $query = static::where('slug', $slug);

        if (! method_exists($query, 'first')) {
<<<<<<< HEAD
            return [];
=======
            return BlockData::collection([]);
>>>>>>> 4b6b99016 (first commit)
        }

        $record = $query->first();
        if (! $record instanceof Model) {
<<<<<<< HEAD
            return [];
=======
            return BlockData::collection([]);
>>>>>>> 4b6b99016 (first commit)
=======
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
        try {
            $record = static::query()->where('slug', $slug)->sole();
        } catch (ModelNotFoundException) {
            return [];
        }

        if (! $record instanceof Model) {
            return [];
>>>>>>> dev
        }

        // Check if getBlocks method exists
        if (! method_exists($record, 'getBlocks')) {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            return [];
        }

        /** @var array<string, BlockData> $blocks */
        $blocks = $record->getBlocks($side);
<<<<<<< HEAD
=======
            return BlockData::collection([]);
        }

        /** @var DataCollection<BlockData> $blocks */
        $blocks = $record->getBlocks();
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev

        return $blocks;
    }
}
