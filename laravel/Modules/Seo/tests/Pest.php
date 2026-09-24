<?php

declare(strict_types=1);

<<<<<<< HEAD
/*
 * Bootstrap Pest — modulo Seo.
 * Ogni file test dichiara uses(\Modules\Seo\Tests\TestCase::class) se serve il container.
 * Vietato pest()->extend() e uses()->group() qui (PHPStan method.internalClass).
 */
=======
use Modules\Seo\Tests\TestCase;

/*
 * Bootstrap Pest — modulo Seo.
 * `pest()->extend(TestCase::class)->in(...)` è la forma **consigliata** (XOT-5.41).
 * Non duplicare `uses(TestCase::class)` nei file: XOR → TestCaseAlreadyInUse.
 */
pest()->extend(TestCase::class)->in(__DIR__.'/Unit', __DIR__.'/Feature');

uses()->group('seo');
>>>>>>> laraxot/dev
