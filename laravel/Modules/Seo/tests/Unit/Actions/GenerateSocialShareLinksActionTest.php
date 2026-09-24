<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Unit\Actions;

use Modules\Seo\Actions\GenerateSocialShareLinksAction;
<<<<<<< HEAD
use Modules\Seo\Data\SocialShareData;
use PHPUnit\Framework\Assert;

uses(\Modules\Seo\Tests\TestCase::class);

=======
use Modules\Seo\Datas\SocialShareData;
use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
it('generates social share links for all platforms', function (): void {
    $data = SocialShareData::from([
        'url' => 'https://example.com/page',
        'title' => 'Test Title',
        'text' => 'Check this out',
    ]);

<<<<<<< HEAD
    $links = app(GenerateSocialShareLinksAction::class)->execute($data);
=======
    $action = new GenerateSocialShareLinksAction();
    $links = $action->execute($data);
>>>>>>> laraxot/dev

    foreach (['facebook', 'twitter', 'linkedin', 'whatsapp', 'telegram', 'copy'] as $key) {
        Assert::assertArrayHasKey($key, $links);
    }
    Assert::assertStringContainsString(urlencode('https://example.com/page'), (string) $links['facebook']);
    Assert::assertSame('https://example.com/page', $links['copy']);
});

<<<<<<< HEAD
it('includes via and hashtags in twitter link when provided', function (): void {
=======
it('includes via and hashtags in twitter link when provided', function () {
>>>>>>> laraxot/dev
    $data = SocialShareData::from([
        'url' => 'https://example.com',
        'via' => 'myhandle',
        'hashtags' => 'laravel,php',
    ]);

<<<<<<< HEAD
    $links = app(GenerateSocialShareLinksAction::class)->execute($data);
=======
    $action = new GenerateSocialShareLinksAction();
    $links = $action->execute($data);
>>>>>>> laraxot/dev

    Assert::assertStringContainsString('via='.urlencode('myhandle'), (string) $links['twitter']);
    Assert::assertStringContainsString('hashtags='.urlencode('laravel,php'), (string) $links['twitter']);
});
