<?php

declare(strict_types=1);

namespace Modules\Cms\View\Components;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\View\Component;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Cms\Actions\View\GetCmsViewAction;
use Modules\Cms\Datas\BlockData;
>>>>>>> 4b6b99016 (first commit)
=======
use Modules\Cms\Datas\BlockData;
>>>>>>> dev
use Modules\Cms\Models\Section as SectionModel;
use Spatie\LaravelData\DataCollection;

/**
 * Section Component.
 *
 * Renders a reusable section of the site using the Section model.
 *
<<<<<<< HEAD
 * @property string      $slug The unique identifier for the section
 * @property string|null $view Custom view path for rendering
 * @property array       $data Additional data to pass to the view
=======
 * @property string $slug The unique identifier for the section
>>>>>>> dev
 */
class Section extends Component
{
    public string $slug;

<<<<<<< HEAD
<<<<<<< HEAD
    public DataCollection|array $blocks;
=======
    /** @var DataCollection<BlockData> */
    public DataCollection $blocks;
>>>>>>> 4b6b99016 (first commit)
=======
    /** @var DataCollection<int, BlockData>|array<int|string, mixed> */
    public DataCollection|array $blocks;
>>>>>>> dev

    public ?string $name = null;

    public ?string $class = null;

    public ?string $id = null;

<<<<<<< HEAD
<<<<<<< HEAD
    public string $tpl = 'v1';
=======
    public ?string $tpl = null;
>>>>>>> 4b6b99016 (first commit)

    /**
     * Create a new component instance.
     *
=======
    public string $tpl = 'v1';

    /**
>>>>>>> dev
     * @param string      $slug  Unique identifier for the section
     * @param string|null $class Additional CSS classes
     * @param string|null $id    Custom ID for the section
     */
    public function __construct(
        string $slug,
        ?string $class = null,
        ?string $id = null,
        ?string $tpl = null,
    ) {
        $this->slug = $slug;
        $this->class = $class;
        $this->id = $id;
<<<<<<< HEAD
<<<<<<< HEAD
        if (is_string($tpl)) {
            $this->tpl = $tpl;
        }
        $blocksResult = SectionModel::getBlocksBySlug($this->slug);
        $this->blocks = $blocksResult;
=======
        $this->tpl = $tpl;
        $this->blocks = SectionModel::getBlocksBySlug($this->slug);
>>>>>>> 4b6b99016 (first commit)
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): ViewContract
    {
<<<<<<< HEAD
        $view = 'pub_theme::components.sections.'.$this->slug.'.'.$this->tpl;
        $view_params = [
            'blocks' => $this->blocks,
        ];

        /* @phpstan-ignore argument.type */
        return view($view, $view_params);
=======
        $baseViewName = 'pub_theme::components.sections.'.$this->slug;
        if ($this->tpl) {
            $baseViewName .= '.'.$this->tpl;
        }

        $viewAction = app(GetCmsViewAction::class);

        try {
            // The action's execute method returns view-string, so PHPStan should be happy
            $view = $viewAction->execute($baseViewName);

            return view($view);
        } catch (\Exception $e) {
            // Fallback: this view exists in the Cms module
            // The action's execute method returns view-string
            $fallbackView = $viewAction->execute('cms::components.section');

            return view($fallbackView);
        }
>>>>>>> 4b6b99016 (first commit)
=======
        if (is_string($tpl) && '' !== $tpl) {
            $this->tpl = $tpl;
        }

        $this->blocks = SectionModel::getBlocksBySlug($this->slug);
    }

    public function render(): ViewContract
    {
        $view = 'pub_theme::components.sections.'.$this->slug.'.'.$this->tpl;
        $viewParams = [
            'blocks' => $this->blocks,
            'section' => $this,
        ];

        return app('view')->make($view, $viewParams);
>>>>>>> dev
    }
}
