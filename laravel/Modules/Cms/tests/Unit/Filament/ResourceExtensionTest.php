<?php

declare(strict_types=1);

<<<<<<< .merge_file_lWyllB
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_5xfZW0
use Modules\Cms\Filament\Resources\MenuResource;
use Modules\Cms\Filament\Resources\PageContentResource;
use Modules\Cms\Filament\Resources\PageResource;
use Modules\Cms\Filament\Resources\SectionResource;
use Modules\Lang\Filament\Resources\LangBaseResource;
use Modules\Xot\Filament\Resources\XotBaseResource;
<<<<<<< .merge_file_lWyllB
use PHPUnit\Framework\Assert;

test('cms resources extend proper base resources', function () {
    foreach ([PageResource::class, PageContentResource::class, SectionResource::class] as $resourceClass) {
        Assert::assertTrue((new ReflectionClass($resourceClass))->isSubclassOf(LangBaseResource::class), "{$resourceClass} must extend LangBaseResource");
    }

    Assert::assertTrue((new ReflectionClass(MenuResource::class))->isSubclassOf(XotBaseResource::class));
});

test('cms resources inherit pages, relations, form and table from their base resource', function () {
=======

test('cms resources extend proper base resources', function () {
    // Multilingual resources should extend LangBaseResource
    expect(PageResource::class)->toBeSubclassOf(LangBaseResource::class);

    expect(PageContentResource::class)->toBeSubclassOf(LangBaseResource::class);

    expect(SectionResource::class)->toBeSubclassOf(LangBaseResource::class);

    // Non-multilingual resources should extend XotBaseResource
    expect(MenuResource::class)->toBeSubclassOf(XotBaseResource::class);
});

test('cms resources do not implement unnecessary methods', function () {
>>>>>>> .merge_file_5xfZW0
    $resources = [
        PageResource::class,
        PageContentResource::class,
        SectionResource::class,
        MenuResource::class,
    ];

    foreach ($resources as $resourceClass) {
        $reflection = new ReflectionClass($resourceClass);

<<<<<<< .merge_file_lWyllB
        // I metodi esistono (ereditati da XotBaseResource): la Resource non deve dichiararli lei.
        foreach (['getPages', 'getRelations', 'form', 'table'] as $method) {
            Assert::assertNotSame(
                $resourceClass,
                $reflection->getMethod($method)->getDeclaringClass()->getName(),
                "{$resourceClass} should not declare {$method}()",
            );
        }
    }
});

test('cms resources keep their form schema in the Schemas form class', function () {
=======
        expect($reflection->hasMethod('getPages'))
            ->toBeFalse()
            ->with("{$resourceClass} should not implement getPages()")
            ->and($reflection->hasMethod('getRelations'))
            ->toBeFalse()
            ->with("{$resourceClass} should not implement getRelations()")
            ->and($reflection->hasMethod('form'))
            ->toBeFalse()
            ->with("{$resourceClass} should not implement form()")
            ->and($reflection->hasMethod('table'))
            ->toBeFalse()
            ->with("{$resourceClass} should not implement table()");
    }
});

test('cms resources implement required getFormSchema method', function () {
>>>>>>> .merge_file_5xfZW0
    $resources = [
        PageResource::class,
        PageContentResource::class,
        SectionResource::class,
        MenuResource::class,
    ];

    foreach ($resources as $resourceClass) {
<<<<<<< .merge_file_lWyllB
        // XotBaseResource::getFormSchema() e' final e vuoto: lo schema vive in `{Resource}\Schemas\{Model}Form`.
        $formClass = $resourceClass::getFormClass();

        Assert::assertSame($resourceClass, $formClass::getResource(), "{$formClass} must belong to {$resourceClass}");
=======
        $reflection = new ReflectionClass($resourceClass);

        expect($reflection->hasMethod('getFormSchema'))
            ->toBeTrue()
            ->with("{$resourceClass} must implement getFormSchema()");

        $method = $reflection->getMethod('getFormSchema');
        expect($method->isPublic())
            ->toBeTrue()
            ->with("{$resourceClass}::getFormSchema() must be public")
            ->and($method->isStatic())
            ->toBeTrue()
            ->with("{$resourceClass}::getFormSchema() must be static")
            ->and($method->getReturnType()?->getName())
            ->toBe('array')
            ->with("{$resourceClass}::getFormSchema() must return array");
>>>>>>> .merge_file_5xfZW0
    }
});

test('cms resources have correct model configuration', function () {
<<<<<<< .merge_file_lWyllB
    Assert::assertSame('Modules\\Cms\\Models\\Page', PageResource::getModel());
    Assert::assertSame('Modules\\Cms\\Models\\PageContent', PageContentResource::getModel());
    Assert::assertSame('Modules\\Cms\\Models\\Section', SectionResource::getModel());
    Assert::assertSame('Modules\\Cms\\Models\\Menu', MenuResource::getModel());
=======
    expect(PageResource::getModel())->toBe('Modules\\Cms\\Models\\Page');

    expect(PageContentResource::getModel())->toBe('Modules\\Cms\\Models\\PageContent');

    expect(SectionResource::getModel())->toBe('Modules\\Cms\\Models\\Section');

    expect(MenuResource::getModel())->toBe('Modules\\Cms\\Models\\Menu');
>>>>>>> .merge_file_5xfZW0
});

test('multilingual resources provide translatable locales', function () {
    $multilingualResources = [
        PageResource::class,
        PageContentResource::class,
        SectionResource::class,
    ];

    foreach ($multilingualResources as $resourceClass) {
        $locales = $resourceClass::getTranslatableLocales();

<<<<<<< .merge_file_lWyllB
        Assert::assertIsArray($locales, "{$resourceClass} must provide translatable locales");
        Assert::assertNotEmpty($locales, "{$resourceClass} must provide translatable locales");
        Assert::assertContains('it', $locales, "{$resourceClass} must support Italian and English locales");
        Assert::assertContains('en', $locales, "{$resourceClass} must support Italian and English locales");
=======
        expect($locales)
            ->toBeArray()
            ->not->toBeEmpty()->with("{$resourceClass} must provide translatable locales")->and($locales)->toContain(
                'it',
                'en',
            )->with("{$resourceClass} must support Italian and English locales");
>>>>>>> .merge_file_5xfZW0
    }
});

test('cms resource form schemas return valid arrays', function () {
    $resources = [
        PageResource::class,
        PageContentResource::class,
        SectionResource::class,
        MenuResource::class,
    ];

    foreach ($resources as $resourceClass) {
<<<<<<< .merge_file_lWyllB
        $formClass = $resourceClass::getFormClass();
        $schema = (new $formClass)->getFormSchema();

        Assert::assertNotEmpty($schema, "{$resourceClass} form class must return a non-empty schema");
=======
        $schema = $resourceClass::getFormSchema();

        expect($schema)
            ->toBeArray()
            ->not->toBeEmpty()->with("{$resourceClass}::getFormSchema() must return non-empty array");
>>>>>>> .merge_file_5xfZW0
    }
});

test('page resource form schema contains expected fields', function () {
<<<<<<< .merge_file_lWyllB
    $formClass = PageResource::getFormClass();
    $schema = (new $formClass)->getFormSchema();

    Assert::assertNotEmpty($schema);

=======
    $schema = PageResource::getFormSchema();

    expect($schema)->toBeArray()->not->toBeEmpty();

    // Check for basic field structure
>>>>>>> .merge_file_5xfZW0
    $hasTitleField = collect($schema)
        ->contains(
            fn ($field) => is_object($field) && method_exists($field, 'getName') && 'title' === $field->getName(),
        );

    $hasSlugField = collect($schema)
        ->contains(fn ($field) => is_object($field) && method_exists($field, 'getName') && 'slug' === $field->getName());

<<<<<<< .merge_file_lWyllB
    Assert::assertTrue($hasTitleField, 'PageResource should have title field');
    Assert::assertTrue($hasSlugField, 'PageResource should have slug field');
});

test('menu resource form schema contains expected fields', function () {
    $formClass = MenuResource::getFormClass();
    $schema = (new $formClass)->getFormSchema();

    Assert::assertNotEmpty($schema);

=======
    expect($hasTitleField)->toBeTrue('PageResource should have title field');
    expect($hasSlugField)->toBeTrue('PageResource should have slug field');
});

test('menu resource form schema contains expected fields', function () {
    $schema = MenuResource::getFormSchema();

    expect($schema)->toBeArray()->not->toBeEmpty();

    // Check for basic field structure
>>>>>>> .merge_file_5xfZW0
    $hasTitleField = collect($schema)
        ->contains(
            fn ($field) => is_object($field) && method_exists($field, 'getName') && 'title' === $field->getName(),
        );

    $hasItemsField = collect($schema)
        ->contains(
            fn ($field) => is_object($field) && method_exists($field, 'getName') && 'items' === $field->getName(),
        );

<<<<<<< .merge_file_lWyllB
    Assert::assertTrue($hasTitleField, 'MenuResource should have title field');
    Assert::assertTrue($hasItemsField, 'MenuResource should have items field');
=======
    expect($hasTitleField)->toBeTrue('MenuResource should have title field');
    expect($hasItemsField)->toBeTrue('MenuResource should have items field');
>>>>>>> .merge_file_5xfZW0
});

test('resources use proper base resource functionality', function () {
    $resources = [
        PageResource::class,
        PageContentResource::class,
        SectionResource::class,
        MenuResource::class,
    ];

    foreach ($resources as $resourceClass) {
        $pages = $resourceClass::getPages();
        $relations = $resourceClass::getRelations();

<<<<<<< .merge_file_lWyllB
        Assert::assertIsArray($pages);
        Assert::assertArrayHasKey('index', $pages, "{$resourceClass} should have standard pages");
        Assert::assertArrayHasKey('create', $pages, "{$resourceClass} should have standard pages");
        Assert::assertArrayHasKey('edit', $pages, "{$resourceClass} should have standard pages");
        Assert::assertIsArray($relations, "{$resourceClass} should return relations array");
=======
        expect($pages)
            ->toBeArray()
            ->toHaveKeys(['index', 'create', 'edit'])
            ->with("{$resourceClass} should have standard pages");

        expect($relations)->toBeArray()->with("{$resourceClass} should return relations array");
>>>>>>> .merge_file_5xfZW0
    }
});

test('resources follow naming conventions', function () {
<<<<<<< .merge_file_lWyllB
    Assert::assertSame('PageResource', class_basename(PageResource::class));
    Assert::assertSame('PageContentResource', class_basename(PageContentResource::class));
    Assert::assertSame('SectionResource', class_basename(SectionResource::class));
    Assert::assertSame('MenuResource', class_basename(MenuResource::class));

    Assert::assertSame('Modules\\Cms\\Models\\Page', PageResource::getModel());
    Assert::assertSame('Modules\\Cms\\Models\\PageContent', PageContentResource::getModel());
    Assert::assertSame('Modules\\Cms\\Models\\Section', SectionResource::getModel());
    Assert::assertSame('Modules\\Cms\\Models\\Menu', MenuResource::getModel());
=======
    expect(class_basename(PageResource::class))->toBe('PageResource');
    expect(class_basename(PageContentResource::class))->toBe('PageContentResource');
    expect(class_basename(SectionResource::class))->toBe('SectionResource');
    expect(class_basename(MenuResource::class))->toBe('MenuResource');

    // Test that model names are correctly derived
    expect(PageResource::getModel())->toBe('Modules\\Cms\\Models\\Page');
    expect(PageContentResource::getModel())->toBe('Modules\\Cms\\Models\\PageContent');
    expect(SectionResource::getModel())->toBe('Modules\\Cms\\Models\\Section');
    expect(MenuResource::getModel())->toBe('Modules\\Cms\\Models\\Menu');
>>>>>>> .merge_file_5xfZW0
});

test('lang base resource provides multilingual features', function () {
    $multilingualResources = [
        PageResource::class,
        PageContentResource::class,
        SectionResource::class,
    ];

    foreach ($multilingualResources as $resourceClass) {
<<<<<<< .merge_file_lWyllB
        Assert::assertTrue(method_exists($resourceClass, 'getTranslatableLocales'));
        Assert::assertTrue(method_exists($resourceClass, 'getDefaultTranslatableLocale'));
=======
        // Test that multilingual methods are available
        expect(method_exists($resourceClass, 'getTranslatableLocales'))->toBeTrue();
        expect(method_exists($resourceClass, 'getDefaultTranslatableLocale'))->toBeTrue();
>>>>>>> .merge_file_5xfZW0

        $locales = $resourceClass::getTranslatableLocales();
        $defaultLocale = $resourceClass::getDefaultTranslatableLocale();

<<<<<<< .merge_file_lWyllB
        Assert::assertIsArray($locales);
        Assert::assertNotEmpty($locales);
        Assert::assertIsString($defaultLocale);
        Assert::assertNotSame('', $defaultLocale);
    }
=======
        expect($locales)->toBeArray()->not->toBeEmpty();
        expect($defaultLocale)->toBeString()->not->toBeEmpty();
    }
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_5xfZW0
});
