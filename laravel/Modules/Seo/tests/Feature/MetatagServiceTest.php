<?php

declare(strict_types=1);

namespace Modules\Seo\Tests\Feature;

    $service = new MetatagService;
    $colors = ['primary' => '#000000', 'secondary' => '#ffffff'];
    $service->setColors($colors);
    Assert::assertSame($colors, $service->get()->getColors());
});
