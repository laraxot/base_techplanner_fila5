<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Feature;

uses(TestCase::class);

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Modules\UI\Models\Asset;
use Modules\UI\Models\Component;
use Modules\UI\Models\Theme;
use Modules\UI\Services\ComponentService;
use Modules\UI\Services\ThemeService;
use Modules\UI\Tests\TestCase;
            if ($component->cache_strategy === 'aggressive') {
                expect($component->cache_duration)->toBeGreaterThan(3600); // 1 ora
            }
        });
    });
});
