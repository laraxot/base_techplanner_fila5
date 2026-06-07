<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(Modules\Cms\Tests\TestCase::class);

use Modules\Cms\View\Components\Page;
use Modules\Cms\View\Components\PageContent;
use Modules\Cms\View\Components\Section;

=======
namespace Modules\Cms\Tests\Unit\View;

use Modules\Cms\View\Components\PageContent;
use Modules\Cms\View\Components\Section;

/*
 * Smoke tests for Section and PageContent view components.
 *
 * Page component tests are in:
 *
 * @see \Modules\Cms\Tests\Unit\View\Components\PageComponentTest
 */
>>>>>>> dev
test('Section component can be instantiated', function () {
    $component = new Section('test-slug');

    expect($component)->toBeInstanceOf(Section::class);
});

<<<<<<< HEAD
test('Page component can be instantiated', function () {
    // Page component requires both 'side' and 'slug' parameters
    $component = new Page('content', 'test-slug');

    expect($component)->toBeInstanceOf(Page::class);
});

=======
>>>>>>> dev
test('PageContent component can be instantiated', function () {
    $component = new PageContent('test-slug');

    expect($component)->toBeInstanceOf(PageContent::class);
});
