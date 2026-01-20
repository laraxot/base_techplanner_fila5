<?php

declare(strict_types=1);

namespace Modules\Cms\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Modules\Cms\Datas\BlockData;
use Modules\Xot\Datas\XotData;
<<<<<<< HEAD
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> 4b6b99016 (first commit)

/**
 * Trait for Models that have blocks.
 *
 * @phpstan-require-extends Model
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
            /** @var array<string, mixed> $block */
            $type = (string) ($block['type'] ?? 'unknown');
            $data = (array) ($block['data'] ?? []);
            $slug = isset($block['slug']) ? (string) $block['slug'] : null;

            $blockDataInstances[(string) $key] = new BlockData($type, $data, $slug);
        }

        /* @var array<string, BlockData> $blockDataInstances */

        // Return array directly to ensure BlockData constructor is called for dynamic query resolution
        return $blockDataInstances;
=======
        /* @var DataCollection<BlockData> $collection */
        return BlockData::collection($blocks);
>>>>>>> 4b6b99016 (first commit)
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
            if (is_array($value)) {
                $result[$key] = $this->compile($value);
            }
=======
>>>>>>> 4b6b99016 (first commit)
        }

        return $result;
    }

    /**
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
>>>>>>> 4b6b99016 (first commit)

        return $blocks;
    }
}
