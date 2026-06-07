<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Cms\Tests\TestCase::class);
=======
namespace Modules\Cms\Tests\Unit\Models\Policies;
>>>>>>> dev

use Modules\Cms\Models\Policies\MenuPolicy;
use Modules\Cms\Models\Policies\PagePolicy;
use Modules\Cms\Models\Policies\SectionPolicy;

test('PagePolicy can be instantiated', function () {
    $policy = new PagePolicy();

    expect($policy)->toBeInstanceOf(PagePolicy::class);
});

test('MenuPolicy can be instantiated', function () {
    $policy = new MenuPolicy();

    expect($policy)->toBeInstanceOf(MenuPolicy::class);
});

test('SectionPolicy can be instantiated', function () {
    $policy = new SectionPolicy();

    expect($policy)->toBeInstanceOf(SectionPolicy::class);
});
