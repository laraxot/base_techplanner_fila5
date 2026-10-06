<?php

declare(strict_types=1);

/*
 * Bootstrap Pest — modulo Seo.
 *
 * Il binding con `Modules\Seo\Tests\TestCase` e' dichiarato in ogni file di test con
 * `uses(TestCase::class);` (una chiamata di funzione). La forma
 * `pest()->extend(TestCase::class)->in(...)` invoca metodi di classi `@internal` di Pest
 * (`Pest\Configuration`, `Pest\PendingCalls\UsesCall`) e PHPStan livello max la segnala
 * con `method.internalClass`: senza ignore ne' baseline l'unica via e' evitare la catena.
 * Non ripetere il binding qui: sarebbe `TestCaseAlreadyInUse`.
 */
