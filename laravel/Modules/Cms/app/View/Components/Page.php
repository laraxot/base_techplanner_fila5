<?php

declare(strict_types=1);

namespace Modules\Cms\View\Components;

use Illuminate\Contracts\View\View as ViewContract;
<<<<<<< HEAD
use Illuminate\View\Component;
use Modules\Cms\Datas\BlockData;
use Modules\Cms\Models\Page as PageModel;
use Spatie\LaravelData\DataCollection;
=======
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Modules\Cms\Datas\BlockData;
use Modules\Cms\Models\Page as PageModel;
use Modules\Xot\Datas\MetatagData;
use Modules\Xot\Datas\XotData;
>>>>>>> 4b6b99016 (first commit)

class Page extends Component
{
    public string $side;

    public string $slug;

<<<<<<< HEAD
    /** @var DataCollection<BlockData>|array */
    public DataCollection|array $blocks;

    public array $data = [];

    public string $container0 = '';

    public string $slug0 = '';

    public function __construct(string $side, string $slug, ?string $type = null, array $data = [], string $container0 = '', string $slug0 = '')
=======
    public array $blocks = [];

    public array $data = [];

    public function __construct(string $side, string $slug, ?string $type = null, array $data = [])
>>>>>>> 4b6b99016 (first commit)
    {
        $this->data = $data;
        $this->side = $side;
        if (null !== $type) {
            $slug = $type.'-'.$slug;
        }
        $this->slug = $slug;
<<<<<<< HEAD
        $this->container0 = $container0;
        $this->slug0 = $slug0;
        $this->blocks = PageModel::getBlocksBySlug($slug, $side);
=======
        $field = $side.'_blocks';
        // $page = PageModel::firstOrCreate(['slug' => $slug], ['title' => $slug, $field => []]);
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
>>>>>>> 4b6b99016 (first commit)
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): ViewContract
    {
<<<<<<< HEAD
        $view = 'cms::components.page';
        $view_params = [
            'blocks' => $this->blocks,
            'side' => $this->side,
            'slug' => $this->slug,
            'data' => $this->data,
            'container0' => $this->container0,
            'slug0' => $this->slug0,
        ];
=======
        $view = 'cms::components.page-content';
        $view_params = [];
>>>>>>> 4b6b99016 (first commit)
        // @phpstan-ignore-next-line
        if (! view()->exists($view)) {
            throw new \Exception('view not found: '.$view);
        }

        return view($view, $view_params);
    }
}
