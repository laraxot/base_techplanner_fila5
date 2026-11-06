<?php

declare(strict_types=1);

<<<<<<< .merge_file_pTRBqR
namespace Modules\Cms\Tests\Unit\Models;
=======
<<<<<<< HEAD
>>>>>>> .merge_file_kT8HXv

use Modules\Cms\Models\Page;
use Modules\Tenant\Models\Traits\SushiToJsons;
use PHPUnit\Framework\Assert;

describe('Page', function (): void {
    test('page model can be instantiated', function (): void {
        $page = new Page;
        Assert::assertSame(Page::class, $page::class);
    });

    test('page extends base model lang', function (): void {
        $page = new Page;
        Assert::assertSame(Page::class, $page::class);
    });

    test('page has expected fillable fields', function (): void {
        $page = new Page;
        $fillable = $page->getFillable();

        Assert::assertContains('title', $fillable);
        Assert::assertContains('slug', $fillable);
        Assert::assertContains('content', $fillable);
        Assert::assertContains('description', $fillable);
        Assert::assertContains('middleware', $fillable);
        Assert::assertContains('content_blocks', $fillable);
        Assert::assertContains('sidebar_blocks', $fillable);
        Assert::assertContains('footer_blocks', $fillable);
    });

    test('page has expected casts', function (): void {
        $page = new Page;
        /** @var array<string, mixed> $casts */
        $casts = $page->getCasts();
        Assert::assertArrayHasKey('created_at', $casts);

        Assert::assertArrayHasKey('updated_at', $casts);

        Assert::assertArrayHasKey('content_blocks', $casts);

        Assert::assertArrayHasKey('sidebar_blocks', $casts);

        Assert::assertArrayHasKey('footer_blocks', $casts);

        Assert::assertArrayHasKey('middleware', $casts);
    });

    test('page has translatable fields configured', function (): void {
        $page = new Page;

        Assert::assertContains('title', $page->translatable);

        Assert::assertContains('content_blocks', $page->translatable);

        Assert::assertContains('sidebar_blocks', $page->translatable);

        Assert::assertContains('footer_blocks', $page->translatable);
    });

    test('page has sushi to jsons trait', function (): void {
        $page = new Page;
        $traits = class_uses_recursive($page);

        Assert::assertContains(SushiToJsons::class, array_values($traits));
    });

    test('page has get rows method for sushi functionality', function (): void {
        $page = new Page;

        Assert::assertNotEmpty($page->getRows());
    });

    test('page has schema definition', function (): void {
        $page = new Page;

        $reflection = new \ReflectionClass($page);
        $schemaProperty = $reflection->getProperty('schema');

        Assert::assertTrue($schemaProperty->isProtected());

        /** @var array<string, mixed> $schema */
        $schema = $schemaProperty->getValue($page);
        Assert::assertArrayHasKey('id', $schema);
        Assert::assertArrayHasKey('title', $schema);
        Assert::assertArrayHasKey('slug', $schema);
        Assert::assertArrayHasKey('content', $schema);
        Assert::assertArrayHasKey('description', $schema);
        Assert::assertArrayHasKey('content_blocks', $schema);
    });

    test('page has get middleware by slug static method', function (): void {
        $result = Page::getMiddlewareBySlug('non-existent-slug');

        Assert::assertSame([], $result);
    });

    test('page casts content blocks to array', function (): void {
        $page = new Page;
        $casts = $page->getCasts();

        Assert::assertSame('array', $casts['content_blocks']);
    });

    test('page casts middleware to array', function (): void {
        $page = new Page;
        $casts = $page->getCasts();

<<<<<<< .merge_file_pTRBqR
        Assert::assertSame('array', $casts['middleware']);
    });
=======
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
>>>>>>> .merge_file_kT8HXv
});
