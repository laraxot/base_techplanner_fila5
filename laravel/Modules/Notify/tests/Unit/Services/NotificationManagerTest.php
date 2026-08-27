<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Mockery;
use Mockery\Expectation;
use Mockery\MockInterface;
use Modules\Notify\Actions\SendNotificationAction;
use Modules\Notify\Services\NotificationManager;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

class NotificationManagerTest extends TestCase
{
    private NotificationManager $serviceNotificationManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->serviceNotificationManager = new NotificationManager();
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /** @test */
    public function it_can_send_notification_to_single_recipient(): void
    {
        $recipient = $this->recipient();
        $templateCode = 'test_template';
        $data = ['key' => 'value'];
        $channels = ['email'];
        $options = ['priority' => 'high'];

        $action = $this->mockSendNotificationAction();
        $this->mockExpectation($action, 'handle')
            ->once()
            ->with($recipient, $templateCode, $data, $channels, $options);

        $this->instance(SendNotificationAction::class, $action);

        $this->serviceNotificationManager->send($recipient, $templateCode, $data, $channels, $options);
    }

    /** @test */
    public function it_can_send_notification_to_multiple_recipients(): void
    {
        $recipients = [
            $this->recipient(),
            $this->recipient(),
        ];
        $templateCode = 'test_template';
        $data = ['key' => 'value'];
        $channels = ['email'];
        $options = ['priority' => 'high'];

        $action = $this->mockSendNotificationAction();
        $this->mockExpectation($action, 'handle')->times(2);

        $this->instance(SendNotificationAction::class, $action);

        $result = $this->serviceNotificationManager->sendMultiple($recipients, $templateCode, $data, $channels, $options);

        $this->assertCount(2, $result);
    }

    /** @test */
    public function it_can_get_template_by_code(): void
    {
        $code = 'test_template';

        $result = $this->serviceNotificationManager->getTemplate($code);

        $this->assertNull($result);
    }

    /** @test */
    public function it_can_get_templates_by_category(): void
    {
        $category = 'test_category';

        $result = $this->serviceNotificationManager->getTemplatesByCategory($category);

        $this->assertCount(0, $result);
    }

    /** @test */
    public function it_throws_exception_when_template_not_found(): void
    {
        $recipient = $this->recipient();
        $templateCode = 'invalid_template';

        try {
            $this->serviceNotificationManager->send($recipient, $templateCode);
            Assert::fail('Expected Exception was not thrown');
        } catch (Exception $exception) {
            Assert::assertSame('Template not found: invalid_template', $exception->getMessage());
        }
    }

    /** @test */
    public function it_returns_array_from_send_method(): void
    {
        $recipient = $this->recipient();
        $templateCode = 'test_template';

        $action = $this->mockSendNotificationAction();
        $this->mockExpectation($action, 'handle')->once();

        $this->instance(SendNotificationAction::class, $action);

        $this->serviceNotificationManager->send($recipient, $templateCode);
    }

    /** @test */
    public function it_returns_array_from_send_multiple_method(): void
    {
        $recipients = [$this->recipient()];
        $templateCode = 'test_template';

        $action = $this->mockSendNotificationAction();
        $this->mockExpectation($action, 'handle')->once();

        $this->instance(SendNotificationAction::class, $action);

        $result = $this->serviceNotificationManager->sendMultiple($recipients, $templateCode);

        $this->assertCount(1, $result);
    }

    private function recipient(): Model
    {
        return new class() extends Model
        {
            protected $guarded = [];

            public $timestamps = false;
        };
    }

    /**
     * @return MockInterface&SendNotificationAction
     */
    private function mockSendNotificationAction(): MockInterface
    {
        /** @var MockInterface&SendNotificationAction $mock */
        $mock = Mockery::mock(SendNotificationAction::class);

        return $mock;
    }

    /**
     * Mockery::shouldReceive() con un singolo nome di metodo restituisce a runtime
     * una Mockery\Expectation concreta, ma la firma nativa dichiara l'unione
     * ExpectationInterface|Expectation|HigherOrderMessage: questo helper restringe
     * il tipo in un punto solo cosi' with()/once()/times() restano disponibili.
     */
    private function mockExpectation(MockInterface $mock, string $method): Expectation
    {
        /** @var Expectation $expectation */
        $expectation = $mock->shouldReceive($method);

        return $expectation;
    }
}
