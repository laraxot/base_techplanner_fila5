<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\UI\Tests\Feature;

use Illuminate\Support\Facades\View;
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;
=======
use Illuminate\Support\Facades\View;
use Tests\TestCase;
>>>>>>> c001364 (.)

uses(TestCase::class);

beforeEach(function () {
<<<<<<< HEAD
    /* @var \Modules\UI\Tests\TestCase $this */
    if (! View::exists('pub_theme::components.blocks.hero.kalshi-inspired')) {
        Assert::markTestSkipped('pub_theme kalshi hero view is not available in this install.');
    }

=======
    // Ensure we're using the correct theme
>>>>>>> c001364 (.)
    if (function_exists('config')) {
        config(['app.locale' => 'en']);
    }
});

test('kalshi inspired hero component renders without errors', function () {
<<<<<<< HEAD
    if (! View::exists('pub_theme::components.blocks.hero.kalshi-inspired')) {
        Assert::markTestSkipped('pub_theme kalshi hero view is not available in this install.');
    }
    $componentData = [
        'title' => 'Test <nome progetto>ion Platform',
=======
    $componentData = [
>>>>>>> c001364 (.)
        'subtitle' => 'Trade on real events with confidence',
        'cta_text' => 'Start Trading',
        'cta_link' => '/markets',
        'secondary_cta_text' => 'View Markets',
        'secondary_cta_link' => '/markets',
        'show_stats' => true,
        'show_categories' => true,
    ];

    $view = View::make('pub_theme::components.blocks.hero.kalshi-inspired', $componentData);

<<<<<<< HEAD
    $html = $view->render();
    Assert::assertStringContainsString((string) 'Test <nome progetto>ion Platform', (string) $html);
    Assert::assertStringContainsString((string) 'Trade on real events with confidence', (string) $html);
    Assert::assertStringContainsString((string) 'Start Trading', (string) $html);
    Assert::assertStringContainsString((string) 'View Markets', (string) $html);
=======
    expect($view)->not()->toBeNull();

    $html = $view->render();
    expect($html)->toContain('Trade on real events with confidence');
    expect($html)->toContain('Start Trading');
    expect($html)->toContain('View Markets');
>>>>>>> c001364 (.)
});

test('kalshi hero shows statistics when enabled', function () {
    $view = View::make('pub_theme::components.blocks.hero.kalshi-inspired', [
        'show_stats' => true,
    ]);

    $html = $view->render();
<<<<<<< HEAD
    Assert::assertStringContainsString((string) '250+', (string) $html);
    Assert::assertStringContainsString((string) 'Active Markets', (string) $html);
    Assert::assertStringContainsString((string) '50K+', (string) $html);
    Assert::assertStringContainsString((string) 'Total <nome progetto>ions', (string) $html);
    Assert::assertStringContainsString((string) '89%', (string) $html);
    Assert::assertStringContainsString((string) 'Accuracy Rate', (string) $html);
    Assert::assertStringContainsString((string) '5K+', (string) $html);
    Assert::assertStringContainsString((string) 'Active Traders', (string) $html);
=======
    expect($html)->toContain('250+');
    expect($html)->toContain('Active Markets');
    expect($html)->toContain('50K+');
    expect($html)->toContain('89%');
    expect($html)->toContain('Accuracy Rate');
    expect($html)->toContain('5K+');
    expect($html)->toContain('Active Traders');
>>>>>>> c001364 (.)
});

test('kalshi hero hides statistics when disabled', function () {
    $view = View::make('pub_theme::components.blocks.hero.kalshi-inspired', [
        'show_stats' => false,
    ]);

    $html = $view->render();
<<<<<<< HEAD
    Assert::assertStringNotContainsString('Active Markets', $html);
    Assert::assertStringNotContainsString('Total <nome progetto>ions', $html);
=======
    expect($html)->not()->toContain('Active Markets');
>>>>>>> c001364 (.)
});

test('kalshi hero shows categories when enabled', function () {
    $view = View::make('pub_theme::components.blocks.hero.kalshi-inspired', [
        'show_categories' => true,
    ]);

    $html = $view->render();
<<<<<<< HEAD
    Assert::assertStringContainsString((string) 'Popular Categories', (string) $html);
    Assert::assertStringContainsString((string) 'Politics', (string) $html);
    Assert::assertStringContainsString((string) 'Sports', (string) $html);
    Assert::assertStringContainsString((string) 'Economics', (string) $html);
    Assert::assertStringContainsString((string) 'Technology', (string) $html);
    Assert::assertStringContainsString((string) 'Entertainment', (string) $html);
    Assert::assertStringContainsString((string) 'Crypto', (string) $html);
=======
    expect($html)->toContain('Popular Categories');
    expect($html)->toContain('Politics');
    expect($html)->toContain('Sports');
    expect($html)->toContain('Economics');
    expect($html)->toContain('Technology');
    expect($html)->toContain('Entertainment');
    expect($html)->toContain('Crypto');
>>>>>>> c001364 (.)
});

test('kalshi hero hides categories when disabled', function () {
    $view = View::make('pub_theme::components.blocks.hero.kalshi-inspired', [
        'show_categories' => false,
    ]);

    $html = $view->render();
<<<<<<< HEAD
    Assert::assertStringNotContainsString('Popular Categories', $html);
=======
    expect($html)->not()->toContain('Popular Categories');
>>>>>>> c001364 (.)
});

test('kalshi hero supports custom props', function () {
    $view = View::make('pub_theme::components.blocks.hero.kalshi-inspired', [
        'title' => 'Custom Market Title',
        'subtitle' => 'Custom trading platform description',
        'cta_text' => 'Join Now',
        'cta_link' => '/register',
        'secondary_cta_text' => 'Learn More',
        'secondary_cta_link' => '/about',
    ]);

    $html = $view->render();
<<<<<<< HEAD
    Assert::assertStringContainsString((string) 'Custom Market Title', (string) $html);
    Assert::assertStringContainsString((string) 'Custom trading platform description', (string) $html);
    Assert::assertStringContainsString((string) 'Join Now', (string) $html);
    Assert::assertStringContainsString((string) 'Learn More', (string) $html);
    Assert::assertStringContainsString((string) 'href="/register"', (string) $html);
    Assert::assertStringContainsString((string) 'href="/about"', (string) $html);
=======
    expect($html)->toContain('Custom Market Title');
    expect($html)->toContain('Custom trading platform description');
    expect($html)->toContain('Join Now');
    expect($html)->toContain('Learn More');
    expect($html)->toContain('href="/register"');
    expect($html)->toContain('href="/about"');
>>>>>>> c001364 (.)
});

test('kalshi hero has proper css classes and styling', function () {
    $view = View::make('pub_theme::components.blocks.hero.kalshi-inspired');

    $html = $view->render();
<<<<<<< HEAD
    Assert::assertStringContainsString((string) 'bg-gradient-to-br from-slate-900', (string) $html);
    Assert::assertStringContainsString((string) 'animate-gradient-x', (string) $html);
    Assert::assertStringContainsString((string) 'bg-grid-pattern', (string) $html);
    Assert::assertStringContainsString((string) 'dark:from-slate-950', (string) $html);
=======
    expect($html)->toContain('bg-gradient-to-br from-slate-900');
    expect($html)->toContain('animate-gradient-x');
    expect($html)->toContain('bg-grid-pattern');
    expect($html)->toContain('dark:from-slate-950');
>>>>>>> c001364 (.)
});

test('kalshi hero includes required css animations', function () {
    $view = View::make('pub_theme::components.blocks.hero.kalshi-inspired');

    $html = $view->render();
<<<<<<< HEAD
    Assert::assertStringContainsString((string) '@keyframes gradient-x', (string) $html);
    Assert::assertStringContainsString((string) '.animate-gradient-x', (string) $html);
    Assert::assertStringContainsString((string) '.bg-grid-pattern', (string) $html);
=======
    expect($html)->toContain('@keyframes gradient-x');
    expect($html)->toContain('.animate-gradient-x');
    expect($html)->toContain('.bg-grid-pattern');
>>>>>>> c001364 (.)
});

test('kalshi hero has responsive design classes', function () {
    $view = View::make('pub_theme::components.blocks.hero.kalshi-inspired');

    $html = $view->render();
<<<<<<< HEAD
    Assert::assertStringContainsString((string) 'md:text-7xl lg:text-8xl', (string) $html);
    Assert::assertStringContainsString((string) 'grid-cols-2 md:grid-cols-4', (string) $html);
    Assert::assertStringContainsString((string) 'md:grid-cols-3 lg:grid-cols-6', (string) $html);
    Assert::assertStringContainsString((string) 'flex-col sm:flex-row', (string) $html);
=======
    expect($html)->toContain('md:text-7xl lg:text-8xl');
    expect($html)->toContain('grid-cols-2 md:grid-cols-4');
    expect($html)->toContain('md:grid-cols-3 lg:grid-cols-6');
    expect($html)->toContain('flex-col sm:flex-row');
>>>>>>> c001364 (.)
});
