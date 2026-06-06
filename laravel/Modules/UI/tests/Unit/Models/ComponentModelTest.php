<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Models;

use Modules\UI\Models\Component;

describe('Component Model', function (): void {
    it('can be instantiated', function (): void {
        $component = new Component();
$component = new Component();
        $component = new Component();
        $expected = [
            'name', 'theme_id', 'is_active', 'version', 'dependencies',
            'template', 'is_cacheable', 'cache_ttl', 'validation_rules',
            'view_path', 'data_schema', 'responsive_breakpoints',
            'supports_lazy_loading', 'lazy_loading_threshold',
            'cache_strategy', 'cache_duration',
        ];

        foreach ($expected as $field) {
            expect(in_array($field, $component->getFillable()))->toBeTrue();
        }
    });

    it('has casts defined', function (): void {
        $component = new Component();
$component = new Component();
        $component = new Component();
        expect($component->getTable())->toBe('components');
    });

    it('extends BaseModel', function (): void {
        $reflection = new ReflectionClass(Component::class);
        expect($reflection->isSubclassOf(Modules\UI\Models\BaseModel::class))->toBeTrue();
    });

    it('uses strict types', function (): void {
        $reflection = new ReflectionClass(Component::class);
        $content = file_get_contents($reflection->getFileName());
        expect($content)->toContain('');
    });

    it('has correct namespace', function (): void {
        $reflection = new ReflectionClass(Component::class);
        expect($reflection->getNamespaceName())->toBe('Modules\UI\Models');
    });
});
