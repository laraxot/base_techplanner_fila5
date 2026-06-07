<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Cms\Tests\TestCase::class);
=======
namespace Modules\Cms\Tests\Unit\Models;
>>>>>>> dev

use Modules\Cms\Models\PageContent;

test('PageContent model can be instantiated', function () {
    $pageContent = new PageContent();

    expect($pageContent)->toBeInstanceOf(PageContent::class);
});

test('PageContent model has expected fillable fields', function () {
    $pageContent = new PageContent();

    $fillable = $pageContent->getFillable();

    expect($fillable)->toContain('name')
        ->and($fillable)->toContain('slug')
        ->and($fillable)->toContain('blocks');
});

test('PageContent model extends BaseModel', function () {
    $pageContent = new PageContent();

    expect($pageContent)->toBeInstanceOf(Modules\Cms\Models\BaseModel::class);
});

test('PageContent model has translatable fields', function () {
    $pageContent = new PageContent();

<<<<<<< HEAD
<<<<<<< HEAD
    expect(isset($pageContent->translatable))->toBeTrue();
=======
    expect(property_exists($pageContent, 'translatable'))->toBeTrue();
>>>>>>> 4b6b99016 (first commit)
=======
    expect(isset($pageContent->translatable))->toBeTrue();
>>>>>>> dev
    expect($pageContent->translatable)->toContain('name')
        ->and($pageContent->translatable)->toContain('blocks');
});
