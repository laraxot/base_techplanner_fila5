<?php

declare(strict_types=1);
<<<<<<< HEAD

<<<<<<< .merge_file_z92PBz
namespace Modules\Cms\Tests\Unit\Models;

=======
=======
>>>>>>> 6ed19256f (.)
use Modules\Cms\Models\BaseModelLang;
>>>>>>> .merge_file_bwqEuX
use Modules\Cms\Models\Page;
use Modules\Cms\Tests\TestCase;
use Modules\Tenant\Models\Traits\SushiToJsons;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

/**
 * Verifica il contratto pubblico del model Page (pagine CMS multilingua).
 */
final class PageBusinessLogicTest extends TestCase
{
    public function test_extends_base_model_lang_for_translations(): void {}

    public function test_declares_translatable_page_fields(): void
    {
        $expected = [
            'title',
            'blocks',
            'content_blocks',
            'sidebar_blocks',
            'footer_blocks',
        ];

        Assert::assertSame($expected, (new Page)->translatable);
    }

    public function test_exposes_expected_fillable_attributes(): void
    {
        $expected = [
            'content',
<<<<<<< HEAD
            'description',
<<<<<<< .merge_file_z92PBz
            'layout',
=======
=======
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_bwqEuX
            'slug',
            'title',
            'middleware',
            'blocks',
            'content_blocks',
            'sidebar_blocks',
            'footer_blocks',
        ];

<<<<<<< .merge_file_z92PBz
        Assert::assertSame($expected, (new Page)->getFillable());
    }

    public function test_uses_sushi_to_json_trait(): void
    {
        Assert::assertArrayHasKey(SushiToJsons::class, class_uses(Page::class));
    }

    public function test_returns_empty_middleware_when_slug_is_unknown(): void
    {
        Assert::assertSame([], Page::getMiddlewareBySlug('non-existent-slug-for-unit-test'));
    }

    public function test_casts_block_fields_and_middleware_as_arrays(): void
    {
        $casts = (new Page)->getCasts();

        Assert::assertSame('array', $casts['content_blocks']);
        Assert::assertSame('array', $casts['sidebar_blocks']);
        Assert::assertSame('array', $casts['footer_blocks']);
        Assert::assertSame('array', $casts['middleware']);
    }
}
=======
        expect($page->getFillable())->toEqual($expectedFillable);
    });

    test('page has sushi to json trait', function (): void {
        $traits = class_uses(Page::class);

        expect($traits)->toHaveKey(SushiToJsons::class);
    });

    test('page can get middleware by slug', function (): void {
        $middleware = Page::getMiddlewareBySlug('non-existent-slug');

        expect($middleware)->toBeArray();
    });

    test('page has correct casts for blocks and arrays', function (): void {
        $page = new Page();
<<<<<<< HEAD
=======
        /** @phpstan-ignore-next-line method.nonObject */
        $casts = $page->getCasts();

        /* @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['content_blocks'])->toBe('array');
        /* @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['sidebar_blocks'])->toBe('array');
        /* @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['footer_blocks'])->toBe('array');
        /* @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> 6ed19256f (.)
        expect($casts['middleware'])->toBe('array');
    });

    test('page has schema definition for structured data', function (): void {
        $page = new Page();

<<<<<<< HEAD
        // Use reflection to access protected $schema property
        $reflection = new ReflectionClass($page);
        $schemaProperty = $reflection->getProperty('schema');

        expect($schemaProperty->isProtected())->toBeTrue();

        $schema = $schemaProperty->getValue($page);
        expect($schema)->toBeArray();
        expect($schema['content_blocks'])->toBe('json');
        expect($schema['sidebar_blocks'])->toBe('json');
        expect($schema['footer_blocks'])->toBe('json');
=======
        expect($page)->toHaveProperty('schema');
        expect($page->schema['content_blocks'])->toBe('json');
        expect($page->schema['sidebar_blocks'])->toBe('json');
        expect($page->schema['footer_blocks'])->toBe('json');
>>>>>>> 6ed19256f (.)
    });

    test('page can get rows for sushi functionality', function (): void {
        $page = new Page();

        expect(method_exists($page, 'getRows'))->toBeTrue();
    });
});
>>>>>>> .merge_file_bwqEuX
