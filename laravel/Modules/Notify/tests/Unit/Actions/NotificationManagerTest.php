<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Mockery;
<<<<<<< .merge_file_ZKPFuZ
use Modules\Notify\Actions\NotificationManager;
use Modules\Notify\Actions\SendNotificationAction;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class);
=======
use Mockery\MockInterface;
use Modules\Notify\Actions\NotificationManager;
use Modules\Notify\Actions\SendNotificationAction;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class)->group('notify-db');
>>>>>>> .merge_file_tKgVnE

function actionsNotificationManagerRecipient(): Model
{
    return new class() extends Model
    {
        protected $guarded = [];

        public $timestamps = false;
    };
}

<<<<<<< .merge_file_ZKPFuZ
=======
/**
 * @template T of object
 *
 * @param  class-string<T>  $class
 * @return MockInterface&T
 */
function actionsNotificationManagerMock(string $class): MockInterface
{
    /** @var MockInterface&T $mock */
    $mock = Mockery::mock($class);

    return $mock;
}

<<<<<<< .merge_file_rnDOTX
=======
>>>>>>> .merge_file_tKgVnE
beforeEach(function (): void {
    $this->notificationManager = new NotificationManager;
});

>>>>>>> .merge_file_b3BPJk
afterEach(function (): void {
    Mockery::close();
});

it('can send notification to single recipient', function (): void {
    $notificationManager = new NotificationManager();
    $recipient = actionsNotificationManagerRecipient();
    $templateCode = 'test_template';
    $data = ['key' => 'value'];
    $channels = ['email'];
    $options = ['priority' => 'high'];

<<<<<<< .merge_file_rnDOTX
    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($templateCode);

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')
        ->with($recipient, $templateCode, $data, $channels, $options)
        ->once();

    app()->instance(SendNotificationAction::class, $action);
=======
<<<<<<< .merge_file_ZKPFuZ
    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($templateCode);

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')
        ->with($recipient, $templateCode, $data, $channels, $options)
        ->once();

    app()->instance(SendNotificationAction::class, $action);
=======
    $action = actionsNotificationManagerMock(SendNotificationAction::class);
    $action->shouldReceive('handle')
        ->once()
        ->with($recipient, $templateCode, $data, $channels, $options);

    $this->instance(SendNotificationAction::class, $action);
>>>>>>> .merge_file_tKgVnE
>>>>>>> .merge_file_b3BPJk

    $notificationManager->send($recipient, $templateCode, $data, $channels, $options);
});

it('can send notification to multiple recipients', function (): void {
    $notificationManager = new NotificationManager();
    $recipients = [
        actionsNotificationManagerRecipient(),
        actionsNotificationManagerRecipient(),
    ];
    $templateCode = 'test_template';
    $data = ['key' => 'value'];
    $channels = ['email'];
    $options = ['priority' => 'high'];

<<<<<<< .merge_file_rnDOTX
    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($templateCode);

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->times(2);
=======
<<<<<<< .merge_file_ZKPFuZ
    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($templateCode);

    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->times(2);

    app()->instance(SendNotificationAction::class, $action);
=======
    $action = actionsNotificationManagerMock(SendNotificationAction::class);
    $action->shouldReceive('handle')->times(2);

    $this->instance(SendNotificationAction::class, $action);
>>>>>>> .merge_file_tKgVnE
>>>>>>> .merge_file_b3BPJk

    app()->instance(SendNotificationAction::class, $action);

    $result = $notificationManager->sendMultiple($recipients, $templateCode, $data, $channels, $options);

    expect($result)->toHaveCount(2);
});

it('can get template by code', function (): void {
    $notificationManager = new NotificationManager();
    $code = 'test_template';

<<<<<<< .merge_file_rnDOTX
=======
<<<<<<< .merge_file_ZKPFuZ
>>>>>>> .merge_file_b3BPJk
    $template = typedMock(NotificationTemplate::class);
    mockExpectation($template, 'getAttribute')->with('code')->andReturn($code);
    mockExpectation($template, 'getAttribute')->with('is_active')->andReturn(true);

<<<<<<< .merge_file_rnDOTX
    $result = $notificationManager->getTemplate($code);
=======
=======
>>>>>>> .merge_file_tKgVnE
    $result = $this->notificationManager->getTemplate($code);
>>>>>>> .merge_file_b3BPJk

    expect($result)->toBeNull();
});

it('can get templates by category', function (): void {
<<<<<<< .merge_file_rnDOTX
    $notificationManager = new NotificationManager();
    $category = 'test_category';

    $result = $notificationManager->getTemplatesByCategory($category);
=======
<<<<<<< .merge_file_ZKPFuZ
    $result = $this->notificationManager->getTemplatesByCategory('test_category');
=======
    $category = 'test_category';

    $result = $this->notificationManager->getTemplatesByCategory($category);
>>>>>>> .merge_file_tKgVnE
>>>>>>> .merge_file_b3BPJk

    expect($result)->toHaveCount(0);
});

it('throws exception when template not found', function (): void {
    $notificationManager = new NotificationManager();
    $recipient = actionsNotificationManagerRecipient();
<<<<<<< .merge_file_ZKPFuZ

    expect(fn () => $this->notificationManager->send($recipient, 'invalid_template'))
=======
    $templateCode = 'invalid_template';

<<<<<<< .merge_file_rnDOTX
    expect(fn () => $notificationManager->send($recipient, $templateCode))
=======
    expect(fn () => $this->notificationManager->send($recipient, $templateCode))
>>>>>>> .merge_file_tKgVnE
>>>>>>> .merge_file_b3BPJk
        ->toThrow(Exception::class, 'Template not found: invalid_template');
});

it('returns array from send method', function (): void {
    /** @var TestCase $this */
    $notificationManager = new NotificationManager();
    $recipient = actionsNotificationManagerRecipient();
    $templateCode = 'test_template';

<<<<<<< .merge_file_ZKPFuZ
    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->once();

    app()->instance(SendNotificationAction::class, $action);
=======
    $action = actionsNotificationManagerMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->once();

    $this->instance(SendNotificationAction::class, $action);
>>>>>>> .merge_file_tKgVnE

    $notificationManager->send($recipient, $templateCode);
});

it('returns array from send multiple method', function (): void {
    /** @var TestCase $this */
    $notificationManager = new NotificationManager();
    $recipients = [actionsNotificationManagerRecipient()];
    $templateCode = 'test_template';

<<<<<<< .merge_file_ZKPFuZ
    $action = typedMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->once();

    app()->instance(SendNotificationAction::class, $action);
=======
    $action = actionsNotificationManagerMock(SendNotificationAction::class);
    mockExpectation($action, 'handle')->once();

    $this->instance(SendNotificationAction::class, $action);
>>>>>>> .merge_file_tKgVnE

    $result = $notificationManager->sendMultiple($recipients, $templateCode);

    expect($result)->toHaveCount(1);
});
