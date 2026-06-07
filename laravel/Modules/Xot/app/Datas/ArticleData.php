<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
<<<<<<< HEAD
 * Class ArticleData - Gestisce la configurazione degli articoli per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 */
class ArticleData extends Data
{
    /**
     * @param  array<int, string>  $types  Tipi di articolo disponibili
     * @param  array<int, string>  $categories  Categorie disponibili
     * @param  bool  $enable_comments  Se abilitare i commenti
     * @param  bool  $moderate_comments  Se moderare i commenti
     * @param  string  $editor  Tipo di editor (markdown, wysiwyg)
     * @param  bool  $enable_rating  Se abilitare le valutazioni
     * @param  array<string, string>  $default_meta  Meta tag predefiniti
     * @param  bool  $show_author  Se mostrare l'autore
     * @param  bool  $show_date  Se mostrare la data
     * @param  bool  $show_reading_time  Se mostrare il tempo di lettura
     */
    public function __construct(
        public readonly array $types = ['post', 'page', 'news'],
        public readonly array $categories = [],
        public readonly bool $enable_comments = true,
        public readonly bool $moderate_comments = true,
        public readonly string $editor = 'markdown',
        public readonly bool $enable_rating = false,
        public readonly array $default_meta = [
=======
 * Class ArticleData - Gestisce la configurazione degli articoli.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 *
 * @param array<int, string> $types
 * @param array<int, string> $categories
 * @param string $editor
 * @param array<string, string> $defaultMeta
 * @param array<string, bool> $features
 */
final class ArticleData extends Data
{
    public function __construct(
        public readonly array $types = ['post', 'page', 'news'],
        public readonly array $categories = [],
        public readonly string $editor = 'markdown',
        public readonly array $defaultMeta = [
>>>>>>> dev
            'title' => '',
            'description' => '',
            'keywords' => '',
        ],
<<<<<<< HEAD
        public readonly bool $show_author = true,
        public readonly bool $show_date = true,
        public readonly bool $show_reading_time = true,
    ) {}
=======
        public readonly array $features = [
            'enable_comments' => true,
            'moderate_comments' => true,
            'enable_rating' => false,
            'show_author' => true,
            'show_date' => true,
            'show_reading_time' => true,
        ],
    ) {
    }
>>>>>>> dev

    /**
     * Create a new instance of ArticleData with default values.
     */
<<<<<<< HEAD
    public static function make(): static
    {
        return new static;
=======
    public static function make(): self
    {
        return new self();
>>>>>>> dev
    }
}
