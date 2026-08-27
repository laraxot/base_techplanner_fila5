<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Filament\Widgets;

use Modules\Seo\Filament\Widgets\SocialShareWidget;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Seo\Tests\TestCase;
use PHPUnit\Framework\Assert;
=======
use Tests\TestCase;
>>>>>>> 7ec200b (.)
=======
use Tests\TestCase;
>>>>>>> d20252d (.)
=======
use Tests\TestCase;
>>>>>>> 77e0353 (.)

uses(TestCase::class);

it('builds social links and exposes platforms in widget view data', function (): void {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    /** @var TestCase $this */
>>>>>>> cf01f0b (.)
    $widget = new class() extends SocialShareWidget
    {
        /** @return array<string, mixed> */
=======
    $widget = new class extends SocialShareWidget
    {
>>>>>>> 7ec200b (.)
=======
    $widget = new class extends SocialShareWidget {
>>>>>>> d20252d (.)
=======
    $widget = new class extends SocialShareWidget {
>>>>>>> 77e0353 (.)
=======
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
use PHPUnit\Framework\Assert;
uses(\Modules\Seo\Tests\TestCase::class);

it('builds social links and exposes platforms in widget view data', function (): void {
    $widget = new class extends SocialShareWidget
    {
        /** @return array<string, mixed> */
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> fc52fe0 (.)
=======
>>>>>>> c101b34 (.)
=======
>>>>>>> d0f51b6 (.)
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
<<<<<<< HEAD
<<<<<<< HEAD
    $widget = new SocialShareWidget();

    Assert::assertSame([], $widget->getFormSchema());
=======
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
    expect($viewData)->toHaveKeys(['links', 'platforms', 'data'])
        ->and($viewData['links'])->toHaveKeys(['facebook', 'twitter', 'linkedin', 'whatsapp', 'telegram', 'copy'])
        ->and($viewData['links']['copy'])->toBe('https://example.test/page')
        ->and($viewData['platforms'])->toContain('facebook');
});

it('returns empty form schema', function (): void {
    $widget = new SocialShareWidget;

    expect($widget->getFormSchema())->toBe([]);
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 7ec200b (.)
=======
>>>>>>> d20252d (.)
=======
>>>>>>> 77e0353 (.)
=======
    $widget = new SocialShareWidget;

    Assert::assertSame([], $widget->getFormSchema());
>>>>>>> fc52fe0 (.)
=======
    $widget = new SocialShareWidget;

    Assert::assertSame([], $widget->getFormSchema());
>>>>>>> c101b34 (.)
=======
    $widget = new SocialShareWidget;

    Assert::assertSame([], $widget->getFormSchema());
>>>>>>> d0f51b6 (.)
});
