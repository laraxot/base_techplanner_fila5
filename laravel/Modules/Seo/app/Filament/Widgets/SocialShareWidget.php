<?php

declare(strict_types=1);

namespace Modules\Seo\Filament\Widgets;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Modules\Seo\Actions\GenerateSocialShareLinksAction;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Seo\Datas\SocialShareData;
=======
use Modules\Seo\Data\SocialShareData;
>>>>>>> cf01f0b (.)
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
=======
use Modules\Seo\Data\SocialShareData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> 7ec200b (.)
=======
use Modules\Seo\Actions\GenerateSocialShareLinksAction;
use Modules\Seo\Data\SocialShareData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> d20252d (.)
=======
use Modules\Seo\Actions\GenerateSocialShareLinksAction;
use Modules\Seo\Data\SocialShareData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
>>>>>>> 77e0353 (.)
=======
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
use Filament\Schemas\Components\Component;
use Modules\Seo\Actions\GenerateSocialShareLinksAction;
use Modules\Seo\Data\SocialShareData;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)

/**
 * Filament widget for social sharing.
 */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
class SocialShareWidget extends XotBaseSchemaWidget
=======
class SocialShareWidget extends XotBaseWidget
>>>>>>> 7ec200b (.)
{
    /**
=======
=======
>>>>>>> 77e0353 (.)
class SocialShareWidget extends XotBaseWidget
{
    /**
     * The view for the widget.
     */
    protected string $view = 'seo::filament.widgets.social-share';

    /**
<<<<<<< HEAD
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
class SocialShareWidget extends XotBaseSchemaWidget
{
    /**
>>>>>>> fc52fe0 (.)
=======
class SocialShareWidget extends XotBaseSchemaWidget
{
    /**
>>>>>>> c101b34 (.)
=======
class SocialShareWidget extends XotBaseSchemaWidget
{
    /**
>>>>>>> d0f51b6 (.)
     * Dati del form.
     *
     * @var array<string, mixed>
     */
    public ?array $data = [];

    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     * The view for the widget.
     *
     * @phpstan-var view-string
=======
     * The view for the widget.
>>>>>>> 7ec200b (.)
=======
     * The view for the widget.
>>>>>>> fc52fe0 (.)
=======
     * The view for the widget.
>>>>>>> c101b34 (.)
=======
     * The view for the widget.
>>>>>>> d0f51b6 (.)
     */
    protected string $view = 'seo::filament.widgets.social-share';

    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> cf01f0b (.)
=======
>>>>>>> 7ec200b (.)
     * Get the form schema.
     *
     * @return array<int|string, Component>
=======
     * Get the form schema.
     *
     * @return array<int|string, \Filament\Schemas\Components\Component>
>>>>>>> d20252d (.)
=======
     * Get the form schema.
     *
     * @return array<int|string, \Filament\Schemas\Components\Component>
>>>>>>> 77e0353 (.)
=======
     * Get the form schema.
     *
     * @return array<int|string, Component>
>>>>>>> fc52fe0 (.)
=======
     * Get the form schema.
     *
     * @return array<int|string, Component>
>>>>>>> c101b34 (.)
=======
     * Get the form schema.
     *
     * @return array<int|string, Component>
>>>>>>> d0f51b6 (.)
     */
    public function getFormSchema(): array
    {
        return [];
    }

    /**
     * Get the data for the view.
     *
     * @return array<string, mixed>
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
     *
=======
>>>>>>> cf01f0b (.)
     * @SuppressWarnings("PHPMD.StaticAccess")
=======
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
     * @SuppressWarnings("PHPMD.StaticAccess")
>>>>>>> fc52fe0 (.)
=======
     * @SuppressWarnings("PHPMD.StaticAccess")
>>>>>>> c101b34 (.)
=======
     * @SuppressWarnings("PHPMD.StaticAccess")
>>>>>>> d0f51b6 (.)
     */
    protected function getViewData(): array
    {
        /** @var array<string, mixed> $viewData */
        $viewData = $this->data ?? [];

        $shareData = SocialShareData::from([
            'url' => $viewData['url'] ?? url()->current(),
            'title' => $viewData['title'] ?? config('app.name'),
        ]);

        /** @var GenerateSocialShareLinksAction $action */
        $action = app(GenerateSocialShareLinksAction::class);

        return [
            'links' => $action->execute($shareData),
            'platforms' => $shareData->platforms,
            'data' => $shareData,
        ];
    }
}
