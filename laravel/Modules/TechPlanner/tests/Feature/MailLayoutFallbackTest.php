<?php

declare(strict_types=1);

use Modules\Notify\Filament\Forms\Components\HtmlLayoutPathSelect;
use Modules\TechPlanner\Tests\TestCase;
use Modules\Xot\Datas\XotData;

uses(TestCase::class);

/*
 * Il tema pubblico di TechPlanner (Two) non ha `resources/mail-layouts`: l'invio delle e-mail da modello
 * leggeva un file inesistente e «Nuovo modello e-mail» andava in errore 500. Ora si usa il layout di Notify.
 */
it('finds a mail layout for the Two theme, which has none', function (): void {
    expect(base_path('Themes/Two/resources/mail-layouts'))->not->toBeDirectory();
    $xot = XotData::make();
    $xot->pub_theme = 'Two';

    expect($xot->getMailHtmlLayoutPath('base.html'))->toBeFile()
        ->and($xot->getMailHtmlLayoutPath())->toBeDirectory();
});

it('lists the available layouts in the mail template form', function (): void {
    XotData::make()->pub_theme = 'Two';

    expect(HtmlLayoutPathSelect::make()->getOptions())->toHaveKey('base.html');
});
