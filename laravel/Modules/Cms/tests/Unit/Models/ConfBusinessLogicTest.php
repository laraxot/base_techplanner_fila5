<?php

declare(strict_types=1);
<<<<<<< HEAD

<<<<<<< .merge_file_nz9M4o
namespace Modules\Cms\Tests\Unit\Models;
=======
=======
>>>>>>> 6ed19256f (.)
use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Models\Conf;

use function Safe\class_uses;
>>>>>>> .merge_file_suvNrt

use Modules\Cms\Models\Conf;
use Modules\Cms\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Sushi\Sushi;

use function Safe\class_uses;

/**
 * Verifica il contratto pubblico del model Conf (config tenant in-memory via Sushi).
 */
final class ConfBusinessLogicTest extends TestCase
{
    public function test_extends_cms_base_model(): void {}

    public function test_uses_sushi_trait_for_in_memory_rows(): void
    {
        Assert::assertArrayHasKey(Sushi::class, class_uses(Conf::class));
    }

    public function test_exposes_expected_fillable_attributes(): void
    {
        Assert::assertSame(['id', 'name'], (new Conf)->getFillable());
    }

    public function test_uses_name_as_route_key(): void
    {
        Assert::assertSame('name', (new Conf)->getRouteKeyName());
    }
}
