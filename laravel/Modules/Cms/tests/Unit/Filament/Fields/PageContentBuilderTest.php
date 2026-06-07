<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Cms\Tests\TestCase::class);
=======
namespace Modules\Cms\Tests\Unit\Filament\Fields;
>>>>>>> dev

use Modules\Cms\Filament\Fields\PageContentBuilder;

test('PageContentBuilder can be instantiated', function () {
    $field = PageContentBuilder::make('content');

    expect($field)->toBeObject();
});
