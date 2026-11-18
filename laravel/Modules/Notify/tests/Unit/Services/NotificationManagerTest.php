<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Services\NotificationManager;
use Modules\Notify\Tests\TestCase;

class NotificationManagerTest extends TestCase
{
    private NotificationManager $notificationManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->notificationManager = new NotificationManager;
    }

    public function test_get_template_returns_null_when_missing(): void
    {
        $this->assertNull($this->notificationManager->getTemplate('test_template'));
    }

    public function test_get_templates_by_category_returns_collection(): void
    {
        $result = $this->notificationManager->getTemplatesByCategory('test_category');

        $this->assertInstanceOf(Collection::class, $result);
    }

    public function test_send_throws_when_template_not_found(): void
    {
        $recipient = new class extends Model {};

        try {
            $this->notificationManager->send($recipient, 'invalid_template');
            $this->fail('Expected Exception was not thrown');
        } catch (Exception $e) {
            $this->assertSame('Template not found: invalid_template', $e->getMessage());
        }
    }
}
