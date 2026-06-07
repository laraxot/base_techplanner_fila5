<?php

declare(strict_types=1);

namespace Modules\Cms\Http\Livewire\Page;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\Cms\Models\Page;
use Modules\Xot\Services\ThemeService;

class Show extends Component
{
<<<<<<< HEAD
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
=======
    public string $slug = '';

    public bool $cache = true;

    public ?string $theme = null;

    public bool $debug = false;

    public array $pageContent = [];

>>>>>>> dev
    public function mount(): void
    {
        $this->loadPageContent();
    }

<<<<<<< HEAD
    /**
     * Renderizza la vista con i contenuti della pagina.
     */
=======
>>>>>>> dev
    public function render(): View
    {
        return view('cms::livewire.page.show', [
            'pageContent' => $this->pageContent,
            'theme' => $this->theme ?? ThemeService::getTheme(),
        ]);
    }

<<<<<<< HEAD
    /**
     * Regole di validazione per i parametri.
     *
     * @return array<string, string>
     */
=======
>>>>>>> dev
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
<<<<<<< HEAD
            if (! $page instanceof Page) {
=======
            if (! ($page instanceof Page)) {
>>>>>>> 4b6b99016 (first commit)
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
=======
    protected function loadPageContent(): void
    {
        $cacheKey = 'page_content_'.$this->slug.'_'.($this->theme ?? ThemeService::getTheme());

        if ($this->cache) {
            $this->pageContent = Cache::remember($cacheKey, now()->addHours(24), function (): array {
                return $this->fetchPageContent();
            });

            return;
        }

        $this->pageContent = $this->fetchPageContent();
    }

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
>>>>>>> dev
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
