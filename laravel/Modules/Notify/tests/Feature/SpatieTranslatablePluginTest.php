<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use Filament\Facades\Filament;
use Illuminate\Contracts\Auth\Authenticatable;
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;
use Livewire\Livewire;
use Modules\Notify\Database\Factories\MailTemplateFactory;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\ListMailTemplates;
<<<<<<< .merge_file_iWutKe
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

use function Pest\Laravel\actingAs;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Authenticatable::class, $user);
    $user->assignRole('notify::admin');

=======
use Modules\Notify\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

use function Pest\Laravel\actingAs;

uses(TestCase::class)->group('notify-db');

beforeEach(function (): void {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Authenticatable::class, $user);
    $user->assignRole('notify::admin');

>>>>>>> .merge_file_rHr8cg
    actingAs($user);

    Filament::setCurrentPanel(
        Filament::getPanel('notify::admin')
    );
});

test('spatie-translatable plugin is registered in notify::admin panel', function (): void {
    $panel = Filament::getPanel('notify::admin');

    $plugin = $panel->getPlugin('spatie-translatable');

    Assert::assertInstanceOf(SpatieTranslatablePlugin::class, $plugin);

<<<<<<< .merge_file_iWutKe
    $locales = \assertNotifyArray($plugin->getDefaultLocales());
=======
    $locales = XotBasePest::assertArray($plugin->getDefaultLocales());
>>>>>>> .merge_file_rHr8cg
    Assert::assertContains('it', $locales);
    Assert::assertContains('en', $locales);
});

test('locale switcher action exists in ListMailTemplates', function (): void {
    MailTemplateFactory::new()->count(3)->create();

    Livewire::test(ListMailTemplates::class)
        ->assertActionExists('locale_switcher');
});

test('ListMailTemplates renders without plugin registration error', function (): void {
    MailTemplateFactory::new()->count(3)->create();

    Livewire::test(ListMailTemplates::class)
        ->assertSuccessful();
});
