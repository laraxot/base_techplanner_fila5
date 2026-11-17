<?php

declare(strict_types=1);

namespace Modules\Cms\View\Components;

use Illuminate\Contracts\View\View as ViewContract;
<<<<<<< HEAD
use Illuminate\View\Component;
use Modules\Cms\Datas\BlockData;
use Modules\Cms\Models\Page as PageModel;
use Spatie\LaravelData\DataCollection;

/**
 * CMS page shell: blocks loaded by slug. Route/context keys live only in {@see $data}.
 *
 * @SuppressWarnings("PHPMD.StaticAccess")
 */
final class Page extends Component
{
    public string $side;

    public string $slug = '';

    /** @var DataCollection<BlockData>|array */
    public DataCollection|array $blocks;

    /** @var array<string, mixed> */
    public array $data = [];

    /**
     * @param array<string, mixed> $data Opaque context bag (container0, slug0, models, …)
     */
    public function __construct(
        string $side = 'content',
        ?string $slug = null,
        ?string $type = null,
        array $data = [],
    ) {
        $this->side = $side;
        $this->data = $data;

        if (null === $slug && isset($data['slug'])) {
            $slug = (string) $data['slug'];
        }

        if (null === $slug) {
            $slug = '';
        }

        if (null !== $type) {
            $slug = $type.'-'.$slug;
        }

        $this->slug = $slug;

        $this->blocks = PageModel::getBlocksBySlug($this->slug, $this->side);
    }

    public function render(): ViewContract
    {
        return view('cms::components.page', array_merge($this->data, [
            'blocks' => $this->blocks,
            'side' => $this->side,
            'slug' => $this->slug,
            'data' => $this->data,
        ]));
=======
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Modules\Cms\Datas\BlockData;
use Modules\Cms\Models\Page as PageModel;
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Datas\XotData;

class Page extends Component
{
    public string $side;

    public string $slug;

    public array $blocks = [];

    public array $data = [];

    public function __construct(string $side, string $slug, ?string $type = null, array $data = [])
    {
        $this->data = $data;
        $this->side = $side;
        if (null !== $type) {
            $slug = $type.'-'.$slug;
        }
        $this->slug = $slug;
        $field = $side.'_blocks';
        //$page = PageModel::firstOrCreate(['slug' => $slug], ['title' => $slug, $field => []]);
        $page = PageModel::firstWhere('slug', $slug);
        
        if (null === $page) {
            abort(404, 'page not found: '.$slug);
        }
        $metatag = MetatagData::make();

        // Ensure title is string|null, not array
        $title = $page->title;
        if (is_array($title)) {
            $title = null;
        }

        $metatag->concatTitle($title);

        $metatag->concatDescription($page->description);
        $blocks = $page->$field;
        if (is_array($blocks) && ! empty($blocks)) {
            $locales = array_keys($blocks);
            $current_lang = app()->getLocale();
            if (in_array($current_lang, $locales)) {
                $blocks = $blocks[$current_lang];
            } elseif (in_array('it', $locales)) {
                $blocks = $blocks['it'];
            }
        }

        if (! is_array($blocks)) {
            $primary_lang = XotData::make()->primary_lang;
            /* @phpstan-ignore-next-line method.notFound */
            $blocks = $page->getTranslation($field, $primary_lang);
        }
        if (! is_array($blocks)) {
            $blocks = [];
        }
        $blocks = Arr::map($blocks, function ($block) use ($data) {
            if (! is_array($block)) {
                return $block;
            }

            if (! array_key_exists('data', $block)) {
                $block['data'] = $data;

                return $block;
            }

            if (! is_array($block['data'])) {
                $block['data'] = $data;

                return $block;
            }

            $block['data'] = array_merge($data, $block['data']);

            return $block;
        });

        $this->blocks = BlockData::collect($blocks);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): ViewContract
    {
        $view = 'cms::components.page-content';
        $view_params = [];
        // @phpstan-ignore-next-line
        if (! view()->exists($view)) {
            throw new \Exception('view not found: '.$view);
        }

        return view($view, $view_params);
>>>>>>> 6ed19256f (.)
    }
}
