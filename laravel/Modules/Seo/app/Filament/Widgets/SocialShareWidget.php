<?php

declare(strict_types=1);

namespace Modules\Seo\Filament\Widgets;

use Filament\Schemas\Components\Component;
use Modules\Seo\Actions\GenerateSocialShareLinksAction;
<<<<<<< HEAD
use Modules\Seo\Data\SocialShareData;
=======
use Modules\Seo\Datas\SocialShareData;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * Filament widget for social sharing.
 */
class SocialShareWidget extends XotBaseSchemaWidget
{
    /**
     * Dati del form.
     *
     * @var array<string, mixed>
     */
    public ?array $data = [];

    /**
     * The view for the widget.
     *
     * @phpstan-var view-string
     */
<<<<<<< HEAD
    /** @phpstan-ignore property.defaultValue */
=======
>>>>>>> laraxot/dev
    protected string $view = 'seo::filament.widgets.social-share';

    /**
     * Get the form schema.
     *
     * @return array<int|string, Component>
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
=======
     *
>>>>>>> laraxot/dev
     * @SuppressWarnings("PHPMD.StaticAccess")
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
