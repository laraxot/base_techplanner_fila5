<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Filament\Actions;
<<<<<<< .merge_file_oLTsdm
=======

>>>>>>> .merge_file_5bHfr7
use Closure;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Actions\SendRecordsNotificationAction;
use Modules\Notify\Filament\Actions\SendRecordsNotificationBulkAction;
use Modules\Notify\Filament\Forms\Components\ChannelCheckboxList;
use Modules\Notify\Filament\Forms\Components\MailTemplateSelect;
use Modules\Notify\Tests\Fixtures\SendRecordsNotificationBulkActionSpy;
use Modules\Notify\Tests\TestCase;
<<<<<<< .merge_file_E8Hk8V
=======
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_oLTsdm

uses(\Modules\Notify\Tests\TestCase::class);
=======
>>>>>>> .merge_file_duA5p9
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-notify-db');
>>>>>>> .merge_file_5bHfr7

/**
 * @param  array<string, mixed>  $attributes
 */
function makeDummyNotifyBulkModel(array $attributes = []): Model
{
    return new class($attributes) extends Model
    {
        protected $guarded = [];

        /**
         * @param  array<string, mixed>  $attributes
         */
        public function __construct(array $attributes = [])
        {
            parent::__construct($attributes);
        }
    };
}

test('send records notification bulk action exposes expected schema components', function (): void {
    $action = SendRecordsNotificationBulkAction::make();
    $reflection = new \ReflectionClass(SendRecordsNotificationBulkAction::class);
    $prop = $reflection->getProperty('schema');
    $prop->setAccessible(true);
    $schemaResolver = $prop->getValue($action);

    if ($schemaResolver instanceof Closure) {
        $schema = $schemaResolver();
    } elseif (is_array($schemaResolver)) {
        $schema = $schemaResolver;
    } else {
        $schema = [];
    }

<<<<<<< .merge_file_oLTsdm
    $schema = \assertNotifyArray($schema);
=======
    $schema = XotBasePest::assertArray($schema);
>>>>>>> .merge_file_5bHfr7
    Assert::assertArrayHasKey('mail_template_slug', $schema);
    Assert::assertArrayHasKey('channels', $schema);
    Assert::assertInstanceOf(MailTemplateSelect::class, $schema['mail_template_slug']);
    Assert::assertInstanceOf(ChannelCheckboxList::class, $schema['channels']);
    Assert::assertSame('mail_template_slug', $schema['mail_template_slug']->getName());
    Assert::assertSame('channels', $schema['channels']->getName());
});

test('send records notification bulk action delegates to send records action', function (): void {
    $spy = new SendRecordsNotificationBulkActionSpy();
    app()->instance(SendRecordsNotificationAction::class, $spy);

    $action = SendRecordsNotificationBulkAction::make();
    $reflection = new \ReflectionClass(SendRecordsNotificationBulkAction::class);
    $prop = $reflection->getProperty('action');
    $prop->setAccessible(true);
    $callback = $prop->getValue($action);
    Assert::assertInstanceOf(Closure::class, $callback);

    $records = new EloquentCollection([
        makeDummyNotifyBulkModel(['id' => 1]),
        makeDummyNotifyBulkModel(['id' => 2]),
    ]);

    $callback($records, [
        'mail_template_slug' => 'template-a',
        'channels' => ['mail', 'sms'],
    ]);

    Assert::assertNotNull($spy->received);
    Assert::assertSame(2, $spy->received['count']);
    Assert::assertSame('template-a', $spy->received['slug']);
    Assert::assertSame(['mail', 'sms'], $spy->received['channels']);
});
