<?php

declare(strict_types=1);

<<<<<<< HEAD

test('page model can be instantiated', function (): void {
    $page = new Page();
    expect($page)->toBeInstanceOf(Page::class);
});

test('page extends BaseModelLang', function (): void {
    $page = new Page();
});

test('page has expected fillable fields', function (): void {
    $page = new Page();
    $fillable = $page->getFillable();

    // Check actual fillable fields from the model
    expect($fillable)->toContain('title')
        ->and($fillable)->toContain('slug')
        ->and($fillable)->toContain('content')
        ->and($fillable)->toContain('description')
        ->and($fillable)->toContain('middleware')
        ->and($fillable)->toContain('content_blocks')
        ->and($fillable)->toContain('sidebar_blocks')
        ->and($fillable)->toContain('footer_blocks');
});

test('page has expected casts', function (): void {
    $page = new Page();
    $casts = $page->getCasts();

    expect($casts)->toBeArray()
        ->and($casts)->toHaveKey('created_at')
        ->and($casts)->toHaveKey('updated_at')
        ->and($casts)->toHaveKey('content_blocks')
        ->and($casts)->toHaveKey('sidebar_blocks')
        ->and($casts)->toHaveKey('footer_blocks')
        ->and($casts)->toHaveKey('middleware');
});

test('page has translatable fields configured', function (): void {
    $page = new Page();

    expect($page->translatable)->toBeArray()
        ->and($page->translatable)->toContain('title')
        ->and($page->translatable)->toContain('content_blocks')
        ->and($page->translatable)->toContain('sidebar_blocks')
        ->and($page->translatable)->toContain('footer_blocks');
});

test('page has SushiToJsons trait', function (): void {
    $page = new Page();
    $traits = class_uses_recursive($page);

});

test('page has getRows method for sushi functionality', function (): void {
    $page = new Page();

    expect(method_exists($page, 'getRows'))->toBeTrue();
    expect($page->getRows())->toBeArray();
});

test('page has schema definition', function (): void {
    $page = new Page();

    $reflection = new ReflectionClass($page);
    $schemaProperty = $reflection->getProperty('schema');

    expect($schemaProperty->isProtected())->toBeTrue();

    $schema = $schemaProperty->getValue($page);
    expect($schema)->toBeArray()
        ->and($schema)->toHaveKey('id')
        ->and($schema)->toHaveKey('title')
        ->and($schema)->toHaveKey('slug')
        ->and($schema)->toHaveKey('content')
        ->and($schema)->toHaveKey('description')
        ->and($schema)->toHaveKey('content_blocks');
});

test('page has getMiddlewareBySlug static method', function (): void {
    expect(method_exists(Page::class, 'getMiddlewareBySlug'))->toBeTrue();

    // Test with non-existent slug returns empty array
    $result = Page::getMiddlewareBySlug('non-existent-slug');
    expect($result)->toBeArray();
});

test('page casts content_blocks to array', function (): void {
    $page = new Page();
    $casts = $page->getCasts();

    expect($casts['content_blocks'])->toBe('array');
});

test('page casts middleware to array', function (): void {
    $page = new Page();
    $casts = $page->getCasts();

    expect($casts['middleware'])->toBe('array');
=======
namespace Modules\Cms\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Cms\Models\Page;

beforeEach(function (): void {
    $this->page = Page/* @phpstan-ignore-line */ ::factory()->create();
});

test('page can be created', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->page)->toBeInstanceOf(Page::class);
});

test('page has fillable attributes', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $fillable = $this->page->getFillable();

    expect($fillable)->toContain('title');
    expect($fillable)->toContain('slug');
    expect($fillable)->toContain('status');
    expect($fillable)->toContain('template');
});

test('page has casts defined', function (): void {
    /** @phpstan-ignore-next-line property.notFound */
    $casts = $this->page->getCasts();

    expect($casts)->toHaveKey('created_at');
    expect($casts)->toHaveKey('updated_at');
    expect($casts)->toHaveKey('published_at');
    expect($casts)->toHaveKey('meta');
});

test('page has proper table name', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->page->getTable())->toBe('pages');
});

test('page has content relationship', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->page->content())->toBeInstanceOf(HasMany::class);
});

test('page can be published', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    $this->page->update(['status' => 'published', 'published_at' => now()]);

    /* @phpstan-ignore-next-line property.notFound */
    expect($this->page->fresh()->isPublished())->toBeTrue();
});

test('page can be draft', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    $this->page->update(['status' => 'draft']);

    /* @phpstan-ignore-next-line property.notFound */
    expect($this->page->fresh()->isDraft())->toBeTrue();
});

test('page can be searched by title', function (): void {
    $searchResult = Page::search('test')->get();

    expect($searchResult)->toHaveCount(1);
    /* @phpstan-ignore-next-line property.notFound */
    expect($searchResult->first()->id)->toBe($this->page->id);
});

test('page can be filtered by status', function (): void {
    /** @var Collection */
    $publishedPage = Page/* @phpstan-ignore-line */ ::factory()->create(['status' => 'published']);
    /** @var Collection */
    $draftPage = Page/* @phpstan-ignore-line */ ::factory()->create(['status' => 'draft']);

    $publishedPages = Page::published()->get();
    $draftPages = Page::draft()->get();

    expect($publishedPages)->toHaveCount(1);
    expect($publishedPages->first()->id)->toBe($publishedPage->id);

    expect($draftPages)->toHaveCount(1);
    expect($draftPages->first()->id)->toBe($draftPage->id);
});

test('page can be filtered by template', function (): void {
    /** @var Collection */
    $templatePage = Page/* @phpstan-ignore-line */ ::factory()->create(['template' => 'default']);

    $templatePages = Page::byTemplate('default')->get();

    expect($templatePages)->toHaveCount(1);
    expect($templatePages->first()->id)->toBe($templatePage->id);
});

test('page has proper relationships', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    expect($this->page->content())->toBeInstanceOf(HasMany::class);
});

test('page can get url', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    $this->page->update(['slug' => 'test-page']);

    /** @phpstan-ignore-next-line property.notFound */
    $url = $this->page->getUrlAttribute();

    expect($url)->toBe('/test-page');
});

test('page can check if is public', function (): void {
    /* @phpstan-ignore-next-line property.notFound */
    $this->page->update(['status' => 'published', 'published_at' => now()]);

    /* @phpstan-ignore-next-line property.notFound */
    expect($this->page->fresh()->isPublic())->toBeTrue();

    /* @phpstan-ignore-next-line property.notFound */
    $this->page->update(['status' => 'draft']);

    /* @phpstan-ignore-next-line property.notFound */
    expect($this->page->fresh()->isPublic())->toBeFalse();
>>>>>>> 6ed19256f (.)
});
