<?php

declare(strict_types=1);
<<<<<<< HEAD

<<<<<<< .merge_file_sXsUzg
namespace Modules\Cms\Tests\Unit\Models;

=======
=======
>>>>>>> 6ed19256f (.)
use Modules\Cms\Models\BaseModelLang;
>>>>>>> .merge_file_n1DtIP
use Modules\Cms\Models\Section;
use Modules\Cms\Models\Traits\HasBlocks;
use Modules\Cms\Tests\TestCase;
use Modules\Tenant\Models\Traits\SushiToJsons;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

<<<<<<< .merge_file_sXsUzg
/**
 * Verifica il contratto pubblico del model Section (blocchi multilingua).
 */
final class SectionBusinessLogicTest extends TestCase
{
    public function test_extends_base_model_lang_for_translations(): void {}

    public function test_declares_translatable_name_and_blocks(): void
    {
        Assert::assertSame(['name', 'blocks'], (new Section)->translatable);
    }

    public function test_exposes_expected_fillable_attributes(): void
    {
        Assert::assertSame(['name', 'slug', 'blocks'], (new Section)->getFillable());
    }

    public function test_uses_sushi_to_json_trait(): void
    {
        Assert::assertArrayHasKey(SushiToJsons::class, class_uses(Section::class));
    }

    public function test_uses_has_blocks_trait(): void
    {
        Assert::assertArrayHasKey(HasBlocks::class, class_uses(Section::class));
    }

    public function test_casts_multilingual_fields_as_arrays(): void
    {
        $casts = (new Section)->getCasts();

        Assert::assertSame('array', $casts['name']);
        Assert::assertSame('array', $casts['blocks']);
        Assert::assertSame('string', $casts['id']);
    }
}
=======
describe('Section Business Logic', function (): void {
    test('section extends base model lang for multilingual support', function (): void {
        expect(Section::class)->toBeSubclassOf(BaseModelLang::class);
    });

    test('section has translatable fields configured', function (): void {
        $section = new Section();

        expect($section->translatable)->toEqual([
            'name',
            'blocks',
        ]);
    });

    test('section has expected fillable fields', function (): void {
        $section = new Section();
        $expectedFillable = [
            'name',
            'slug',
            'blocks',
        ];

        expect($section->getFillable())->toEqual($expectedFillable);
    });

    test('section has sushi to json trait', function (): void {
        $traits = class_uses(Section::class);

        expect($traits)->toHaveKey(SushiToJsons::class);
    });

    test('section has has blocks trait', function (): void {
        $traits = class_uses(Section::class);

        expect($traits)->toHaveKey(HasBlocks::class);
    });

    test('section has correct casts for multilingual and structured data', function (): void {
        $section = new Section();
<<<<<<< HEAD
=======
        /** @phpstan-ignore-next-line method.nonObject */
        $casts = $section->getCasts();

        /* @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['name'])->toBe('array');
        /* @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
        expect($casts['blocks'])->toBe('array');
        /* @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
>>>>>>> 6ed19256f (.)
        expect($casts['id'])->toBe('string');
    });

    test('section has schema definition for structured data', function (): void {
        $section = new Section();

<<<<<<< HEAD
        // Use reflection to access protected $schema property
        $reflection = new ReflectionClass($section);
        $schemaProperty = $reflection->getProperty('schema');

        expect($schemaProperty->isProtected())->toBeTrue();

        $schema = $schemaProperty->getValue($section);
        expect($schema)->toBeArray();
        expect($schema['name'])->toBe('json');
        expect($schema['blocks'])->toBe('json');
        expect($schema['slug'])->toBe('string');
=======
        expect($section)->toHaveProperty('schema');
        expect($section->schema['name'])->toBe('json');
        expect($section->schema['blocks'])->toBe('json');
        expect($section->schema['slug'])->toBe('string');
>>>>>>> 6ed19256f (.)
    });

    test('section can get rows for sushi functionality', function (): void {
        $section = new Section();

        expect(method_exists($section, 'getRows'))->toBeTrue();
        expect($section->getRows())->toBeArray();
    });
});
>>>>>>> .merge_file_n1DtIP
