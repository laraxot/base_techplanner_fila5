<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Filament\Widgets;

use Modules\Seo\Filament\Widgets\SocialShareWidget;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
uses(\Modules\Seo\Tests\TestCase::class);

it('builds social links and exposes platforms in widget view data', function (): void {
    $widget = new class extends SocialShareWidget
=======

it('builds social links and exposes platforms in widget view data', function (): void {
    $widget = new class() extends SocialShareWidget
>>>>>>> laraxot/dev
    {
        /** @return array<string, mixed> */
        public function exposeViewData(): array
        {
            return $this->getViewData();
        }
    };

    $widget->data = [
        'url' => 'https://example.test/page',
        'title' => 'Share Me',
    ];

    $viewData = $widget->exposeViewData();

    Assert::assertArrayHasKey('links', $viewData);
    Assert::assertArrayHasKey('platforms', $viewData);
    Assert::assertArrayHasKey('data', $viewData);

    /** @var array<string, string> $links */
    $links = $viewData['links'];
    foreach (['facebook', 'twitter', 'linkedin', 'whatsapp', 'telegram', 'copy'] as $key) {
        Assert::assertArrayHasKey($key, $links);
    }
    Assert::assertSame('https://example.test/page', $links['copy']);

    /** @var list<string> $platforms */
    $platforms = $viewData['platforms'];
    Assert::assertContains('facebook', $platforms);
});

it('returns empty form schema', function (): void {
<<<<<<< HEAD
    $widget = new SocialShareWidget;
=======
    $widget = new SocialShareWidget();
>>>>>>> laraxot/dev

    Assert::assertSame([], $widget->getFormSchema());
});
