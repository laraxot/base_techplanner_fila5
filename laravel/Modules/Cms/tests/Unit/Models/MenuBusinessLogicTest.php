<?php

declare(strict_types=1);
<<<<<<< HEAD

<<<<<<< .merge_file_h0L4Ik
namespace Modules\Cms\Tests\Unit\Models;

=======
=======
>>>>>>> 6ed19256f (.)
use Modules\Cms\Models\BaseModel;
>>>>>>> .merge_file_pxeOeO
use Modules\Cms\Models\Menu;
use Modules\Cms\Tests\TestCase;
use Modules\Tenant\Models\Traits\SushiToJsons;
use Modules\Xot\Contracts\HasRecursiveRelationshipsContract;
<<<<<<< .merge_file_h0L4Ik
use PHPUnit\Framework\Assert;
=======
<<<<<<< HEAD
=======
use Modules\Xot\Models\Traits\TypedHasRecursiveRelationships;
>>>>>>> 6ed19256f (.)

use function Safe\class_uses;

>>>>>>> .merge_file_pxeOeO
use Staudenmeir\LaravelAdjacencyList\Eloquent\Builder;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

<<<<<<< .merge_file_h0L4Ik
use function Safe\class_implements;
use function Safe\class_uses;
=======
describe('Menu Business Logic', function () {
    test('menu extends base model', function () {
        expect(Menu::class)->toBeSubclassOf(BaseModel::class);
    });

    test('menu implements recursive relationships contract', function () {
<<<<<<< HEAD
        $menu = new Menu();
        expect($menu)->toBeInstanceOf(HasRecursiveRelationshipsContract::class);
    });

    test('menu has recursive relationships trait', function () {
        $traits = class_uses_recursive(Menu::class);

        // Menu uses HasRecursiveRelationships from staudenmeir/laravel-adjacency-list
=======
        expect(Menu::class)->toImplement(HasRecursiveRelationshipsContract::class);
    });

    test('menu has recursive relationships trait', function () {
        $traits = class_uses(Menu::class);

        expect($traits)->toHaveKey(TypedHasRecursiveRelationships::class);
>>>>>>> 6ed19256f (.)
    });

    test('menu has sushi to json trait', function () {
        $traits = class_uses(Menu::class);

        expect($traits)->toHaveKey(SushiToJsons::class);
    });

    test('menu has expected fillable fields', function () {
        $menu = new Menu();
        $expectedFillable = [
            'title',
            'items',
            'parent_id',
        ];

        expect($menu->getFillable())->toEqual($expectedFillable);
    });

    test('menu can get tree options for hierarchical display', function () {
        $options = Menu::getTreeMenuOptions();

        expect($options)->toBeArray();
    });
>>>>>>> .merge_file_pxeOeO

/**
 * Verifica il contratto pubblico del model Menu (navigazione gerarchica Sushi).
 */
final class MenuBusinessLogicTest extends TestCase
{
    public function test_extends_cms_base_model(): void {}

    public function test_implements_recursive_relationships_contract(): void
    {
        Assert::assertTrue(in_array(HasRecursiveRelationshipsContract::class, class_implements(Menu::class), true));
    }

    public function test_uses_recursive_relationships_trait(): void
    {
        Assert::assertArrayHasKey(HasRecursiveRelationships::class, class_uses(Menu::class));
    }

    public function test_uses_sushi_to_json_trait(): void
    {
        Assert::assertArrayHasKey(SushiToJsons::class, class_uses(Menu::class));
    }

    public function test_exposes_expected_fillable_attributes(): void
    {
        Assert::assertSame(['title', 'items', 'parent_id'], (new Menu)->getFillable());
    }

    public function test_resolves_human_readable_label_from_title(): void
    {
        $menu = new Menu;
        $menu->title = 'Test Menu';

<<<<<<< .merge_file_h0L4Ik
        Assert::assertSame('Test Menu', $menu->getLabel());
    }
=======
        expect($menu->getLabel())->toBe('Test Menu');
    });

    test('menu has correct casts for structured data', function () {
        $menu = new Menu();
        $casts = $menu->getCasts();

        expect($casts['items'])->toBe('array');
        expect($casts['id'])->toBe('string');
    });

    test('menu has schema definition for structured data', function () {
        $menu = new Menu();

<<<<<<< HEAD
        // Use reflection to access protected $schema property
        $reflection = new ReflectionClass($menu);
        $schemaProperty = $reflection->getProperty('schema');

        expect($schemaProperty->isProtected())->toBeTrue();

        $schema = $schemaProperty->getValue($menu);
        expect($schema)->toBeArray();
        expect($schema['title'])->toBe('string');
        expect($schema['parent_id'])->toBe('integer');
=======
        expect($menu)->toHaveProperty('schema');
        expect($menu->schema['title'])->toBe('string');
        expect($menu->schema['parent_id'])->toBe('integer');
>>>>>>> 6ed19256f (.)
    });

    test('menu can get rows for sushi functionality', function () {
        $menu = new Menu();

        expect(method_exists($menu, 'getRows'))->toBeTrue();
    });
>>>>>>> .merge_file_pxeOeO

    public function test_casts_structured_menu_items_as_array(): void
    {
        $casts = (new Menu)->getCasts();

        Assert::assertSame('array', $casts['items']);
        Assert::assertSame('string', $casts['id']);
    }

    public function test_builds_adjacency_list_tree_queries(): void
    {
        Assert::assertInstanceOf(Builder::class, Menu::tree());
    }

    public function test_can_filter_menu_nodes_by_depth(): void
    {
        Assert::assertInstanceOf(Builder::class, Menu::whereDepth(1));
    }
}
