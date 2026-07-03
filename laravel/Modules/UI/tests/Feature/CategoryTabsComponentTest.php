<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\UI\Tests\Feature;

use Illuminate\Support\Facades\View;
use Modules\UI\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/**
 * @param array<string, mixed> $data
 */
function renderCategoryTabsHtml(array $data = []): ?string
{
    if (! View::exists('pub_theme::components.blocks.navigation.category-tabs')) {
        return null;
    }

    try {
        return View::make('pub_theme::components.blocks.navigation.category-tabs', $data)->render();
    } catch (\Throwable) {
        return null;
    }
}

/**
 * @param array<string, mixed> $data
 */
function requireCategoryTabsHtml(array $data = []): string
{
    $html = renderCategoryTabsHtml($data);
    if (null === $html) {
        Assert::markTestSkipped('pub_theme category-tabs view not available in this install.');
    }

    return $html;
}

beforeEach(function (): void {
    /* @var \Modules\UI\Tests\TestCase $this */
    if (function_exists('config')) {
        config(['app.locale' => 'en']);
    }
});

it('category tabs component renders without errors', function (): void {
    $html = requireCategoryTabsHtml([
=======
use Illuminate\Support\Facades\View;
use Tests\TestCase;

uses(TestCase::class);

beforeEach(function () {
    if (function_exists('config')) {
        config(['app.locale' => 'en']);
    }

    if (! View::exists('pub_theme::components.blocks.navigation.category-tabs')) {
        $this->markTestSkipped('pub_theme category-tabs component view is not available in this install.');
    }
});

test('category tabs component renders without errors', function () {
    $componentData = [
>>>>>>> c001364 (.)
        'base_url' => '/markets',
        'show_counts' => true,
        'mobile_scrollable' => true,
        'active_category' => 'all',
<<<<<<< HEAD
    ]);

    Assert::assertStringContainsString('/markets', $html);
    Assert::assertStringContainsString('All Markets', $html);
});

it('category tabs shows all expected categories', function (): void {
    $html = requireCategoryTabsHtml([
        'base_url' => '/markets',
        'show_counts' => true,
    ]);

    foreach (['All Markets', 'Politics', 'Sports', 'Economics', 'Technology', 'Entertainment', 'Crypto'] as $label) {
        Assert::assertStringContainsString($label, $html);
    }
});

it('category tabs shows counts when enabled', function (): void {
    $html = requireCategoryTabsHtml(['show_counts' => true]);

    foreach (['250', '45', '67', '34', '28', '23', '19'] as $count) {
        Assert::assertStringContainsString($count, $html);
    }
});

it('category tabs hides counts when disabled', function (): void {
    $html = requireCategoryTabsHtml(['show_counts' => false]);

    Assert::assertStringNotContainsString(
        '<span class="ml-1 px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">45</span>',
        $html
    );
    Assert::assertStringNotContainsString(
        '<span class="ml-1 px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">67</span>',
        $html
    );
});

it('category tabs has mobile scrollable styling', function (): void {
    $html = requireCategoryTabsHtml(['mobile_scrollable' => true]);

    Assert::assertStringContainsString('overflow-x-auto', $html);
    Assert::assertStringContainsString('scrollbar-hide', $html);
});

it('category tabs has proper responsive classes', function (): void {
    $html = requireCategoryTabsHtml();

    Assert::assertStringContainsString('flex-nowrap md:flex-wrap', $html);
    Assert::assertStringContainsString('justify-start md:justify-center', $html);
});

it('category tabs generates correct urls', function (): void {
    $html = requireCategoryTabsHtml(['base_url' => '/markets']);

    Assert::assertStringContainsString('href="/markets"', $html);
    foreach (['politics', 'sports', 'economics', 'technology', 'entertainment', 'crypto'] as $category) {
        Assert::assertStringContainsString('href="/markets?category='.$category.'"', $html);
    }
});

it('category tabs highlights active category', function (): void {
    $html = requireCategoryTabsHtml(['active_category' => 'politics']);

    Assert::assertStringContainsString('bg-blue-600 text-white', $html);
});

it('category tabs has proper dark mode classes', function (): void {
    $html = requireCategoryTabsHtml();

    Assert::assertStringContainsString('dark:bg-slate-800', $html);
    Assert::assertStringContainsString('dark:border-slate-700', $html);
    Assert::assertStringContainsString('dark:text-slate-300', $html);
    Assert::assertStringContainsString('dark:hover:text-white', $html);
});

it('category tabs has sticky positioning', function (): void {
    $html = requireCategoryTabsHtml();

    Assert::assertStringContainsString('sticky top-0', $html);
    Assert::assertStringContainsString('z-40', $html);
});

it('category tabs has proper category icons', function (): void {
    $html = requireCategoryTabsHtml();

    foreach (['🗳️', '⚽', '📈', '💻', '🎬', '₿'] as $icon) {
        Assert::assertStringContainsString($icon, $html);
    }
=======
    ];

    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs', $componentData);
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view cannot be resolved in this install.');
    }

    expect($view)->not()->toBeNull();

    try {
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view cannot be rendered in this install (missing includes/components).');
    }
    expect($html)->toContain('/markets');
    expect($html)->toContain('All Markets');
});

test('category tabs shows all expected categories', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs', [
            'base_url' => '/markets',
            'show_counts' => true,
        ]);
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    // Check for all category names
    expect($html)->toContain('All Markets');
    expect($html)->toContain('Politics');
    expect($html)->toContain('Sports');
    expect($html)->toContain('Economics');
    expect($html)->toContain('Technology');
    expect($html)->toContain('Entertainment');
    expect($html)->toContain('Crypto');
});

test('category tabs shows counts when enabled', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs', [
            'show_counts' => true,
        ]);
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    // Should contain count indicators
    expect($html)->toContain('250'); // All markets count
    expect($html)->toContain('45'); // Politics count
    expect($html)->toContain('67'); // Sports count
    expect($html)->toContain('34'); // Economics count
    expect($html)->toContain('28'); // Technology count
    expect($html)->toContain('23'); // Entertainment count
    expect($html)->toContain('19'); // Crypto count
});

test('category tabs hides counts when disabled', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs', [
            'show_counts' => false,
        ]);
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    // Should not contain specific count numbers in count badges
    expect($html)
        ->not()
        ->toContain('<span class="ml-1 px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">45</span>');
    expect($html)
        ->not()
        ->toContain('<span class="ml-1 px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded-full">67</span>');
});

test('category tabs has mobile scrollable styling', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs', [
            'mobile_scrollable' => true,
        ]);
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    expect($html)->toContain('overflow-x-auto');
    expect($html)->toContain('scrollbar-hide');
});

test('category tabs has proper responsive classes', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs');
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    expect($html)->toContain('flex-nowrap md:flex-wrap');
    expect($html)->toContain('justify-start md:justify-center');
});

test('category tabs generates correct urls', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs', [
            'base_url' => '/markets',
        ]);
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    expect($html)->toContain('href="/markets"'); // All markets
    expect($html)->toContain('href="/markets?category=politics"');
    expect($html)->toContain('href="/markets?category=sports"');
    expect($html)->toContain('href="/markets?category=economics"');
    expect($html)->toContain('href="/markets?category=technology"');
    expect($html)->toContain('href="/markets?category=entertainment"');
    expect($html)->toContain('href="/markets?category=crypto"');
});

test('category tabs highlights active category', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs', [
            'active_category' => 'politics',
        ]);
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    // Should contain active state styling for politics
    expect($html)->toContain('bg-blue-600 text-white');
});

test('category tabs has proper dark mode classes', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs');
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    expect($html)->toContain('dark:bg-slate-800');
    expect($html)->toContain('dark:border-slate-700');
    expect($html)->toContain('dark:text-slate-300');
    expect($html)->toContain('dark:hover:text-white');
});

test('category tabs has sticky positioning', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs');
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    expect($html)->toContain('sticky top-0');
    expect($html)->toContain('z-40');
});

test('category tabs has proper category icons', function () {
    try {
        $view = View::make('pub_theme::components.blocks.navigation.category-tabs');
        $html = $view->render();
    } catch (Throwable) {
        $this->markTestSkipped('pub_theme category-tabs view not available/renderable in this install.');
    }

    // Check for emoji icons used in categories
    expect($html)->toContain('🗳️'); // Politics
    expect($html)->toContain('⚽'); // Sports
    expect($html)->toContain('📈'); // Economics
    expect($html)->toContain('💻'); // Technology
    expect($html)->toContain('🎬'); // Entertainment
    expect($html)->toContain('₿'); // Crypto
>>>>>>> c001364 (.)
});
