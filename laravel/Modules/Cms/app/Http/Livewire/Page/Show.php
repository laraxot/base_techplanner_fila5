<?php

declare(strict_types=1);

namespace Modules\Cms\Http\Livewire\Page;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\Cms\Models\Page;
use Modules\Xot\Actions\Theme\GetThemeAction;

class Show extends Component
{
<<<<<<< HEAD
    public string $slug = '';

    public bool $cache = true;

    public ?string $theme = null;

    public bool $debug = false;

    /** @var array<string, mixed> */
    public array $pageContent = [];

=======
    /**
     * Lo slug della pagina da visualizzare.
     */
    public string $slug;

    /**
     * Se utilizzare la cache per i contenuti.
     */
    public bool $cache = true;

    /**
     * Il tema da utilizzare.
     */
    public ?string $theme = null;

    /**
     * Se mostrare informazioni di debug.
     */
    public bool $debug = false;

    /**
     * I contenuti della pagina.
     *
     * @var array<string, mixed>
     */
    /** @var array<string, mixed> */
    public array $pageContent = [];

    /**
     * Carica i contenuti della pagina.
     */
>>>>>>> 6ed19256f (.)
    public function mount(): void
    {
        $this->loadPageContent();
    }

<<<<<<< .merge_file_jrVPe6
    public function render(): View|Factory
=======
<<<<<<< HEAD
=======
    /**
     * Renderizza la vista con i contenuti della pagina.
     */
>>>>>>> 6ed19256f (.)
    public function render(): View
>>>>>>> .merge_file_kAFBfY
    {
        $viewName = 'cms::livewire.page.show';

        return view($viewName, [
            'pageContent' => $this->pageContent,
            'theme' => $this->theme ?? app(GetThemeAction::class)->execute(),
        ]);
    }

<<<<<<< .merge_file_jrVPe6
    /**
     * @return array<string, string>
     */
=======
<<<<<<< HEAD
=======
    /**
     * Regole di validazione per i parametri.
     *
     * @return array<string, string>
     */
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_kAFBfY
    protected function rules(): array
    {
        return [
            'slug' => 'required|string',
            'cache' => 'boolean',
            'theme' => 'nullable|string',
            'debug' => 'boolean',
        ];
    }

<<<<<<< HEAD
    protected function loadPageContent(): void
    {
        $cacheKey = 'page_content_'.$this->slug.'_'.($this->theme ?? app(GetThemeAction::class)->execute());

        if ($this->cache) {
            $cached = Cache::remember($cacheKey, now()->addHours(24), function (): array {
                return $this->fetchPageContent();
            });
            $content = [];
            foreach (is_array($cached) ? $cached : [] as $key => $value) {
                $content[(string) $key] = $value;
            }
            $this->pageContent = $content;

            return;
        }

        $this->pageContent = $this->fetchPageContent();
    }

    /**
     * @return array<string, mixed>
     */
    protected function fetchPageContent(): array
    {
        try {
            $page = Page::findUniqueBySlug($this->slug);

            if (! $page instanceof Page) {
                return ['error' => 'Page not found', 'slug' => $this->slug];
            }

            $title = is_scalar($page->title) ? (string) $page->title : $this->slug;
            $content = is_scalar($page->content) ? (string) $page->content : '';

            return [
                'title' => $title,
                'subtitle' => null,
                'content' => $content,
                'meta' => [
                    'description' => is_scalar($page->description) ? (string) $page->description : null,
                    'keywords' => null,
                ],
                'blocks' => is_array($page->content_blocks) ? $page->content_blocks : [],
=======
    /**
     * Carica i contenuti della pagina, eventualmente dalla cache.
     */
    protected function loadPageContent(): void
    {
        // Chiave per la cache
        $cacheKey = 'page_content_'.$this->slug.'_'.($this->theme ?? ThemeService::getTheme());

        // Se la cache è abilitata, tenta di recuperare dalla cache
        if ($this->cache) {
            /** @var array<string, mixed> $cached */
            $cached = Cache::remember($cacheKey, now()->addHours(24), $this->fetchPageContent(...));
            $this->pageContent = $cached;
        } else {
            $this->pageContent = $this->fetchPageContent();
        }
    }

    /**
     * Recupera i contenuti della pagina dal database.
     *
     * @return array<string, mixed>
     */
    protected function fetchPageContent(): array
    {
        try {
            // Recupera la pagina dal database
            $page = Page::where('slug', $this->slug)->where('lang', app()->getLocale())->first();

            if (! $page) {
                return ['error' => 'Page not found', 'slug' => $this->slug];
            }

            // Type narrowing: ensure $page is a Page model
            if (! ($page instanceof Page)) {
                return ['error' => 'Invalid page type', 'slug' => $this->slug];
            }

            // Recupera e processa i contenuti della pagina
            // Access model properties directly
            $title = $page->title;
            $subtitle = $page->subtitle ?? null;
            $content = $page->content;
            $metaDescription = $page->meta_description ?? null;
            $metaKeywords = $page->meta_keywords ?? null;
            $contentBlocks = $page->content_blocks;

            return [
                'title' => $title ? (is_array($title) ? $title : (string) $title) : '',
                'subtitle' => $subtitle,
                'content' => $content ? (is_array($content) ? $content : (string) $content) : '',
                'meta' => [
                    'description' => $metaDescription,
                    'keywords' => $metaKeywords,
                ],
                'blocks' => $contentBlocks ? (is_array($contentBlocks) ? $contentBlocks : []) : [],
>>>>>>> 6ed19256f (.)
                'layout' => 'default',
            ];
        } catch (\Exception $e) {
            if ($this->debug) {
                return [
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ];
            }

            return ['error' => 'An error occurred while loading the page'];
        }
    }
}
