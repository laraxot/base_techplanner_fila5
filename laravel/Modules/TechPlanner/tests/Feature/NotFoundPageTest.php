<?php

declare(strict_types=1);

use Modules\TechPlanner\Tests\TestCase;

uses(TestCase::class);

/*
 * La 404 del tema Two includeva `cms::components.head` senza le variabili del componente Head
 * (`pubTheme`, `panelAssets`): ogni pagina inesistente del sito rispondeva 500 invece di 404.
 */
it('answers 404, not 500, for a page that does not exist', function (): void {
    $this->get('/it/pagina-che-non-esiste-'.uniqid())
        ->assertNotFound();
});
