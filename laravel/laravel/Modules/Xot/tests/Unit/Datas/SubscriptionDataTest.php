<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Datas;

use Modules\Xot\Datas\SubscriptionData;
use PHPUnit\Framework\TestCase;

class SubscriptionDataTest extends TestCase
{
    public function testCanCreateSubscriptionDataWithDefaults(): void
    {
        $data = SubscriptionData::make();
        $this->assertInstanceOf(SubscriptionData::class, $data);
        $this->assertFalse($data->enable);
        $this->assertEquals('stripe', $data->driver);
        $this->assertTrue($data->trialEnabled);
    }

    public function testCanCreateSubscriptionDataWithCustomValues(): void
    {
        $data = new SubscriptionData(
            enable: true,
            driver: 'paddle',
            trialEnabled: false,
            trialDays: 7,
            allowedModels: ['App\Models\User']
        );
        $this->assertTrue($data->enable);
        $this->assertEquals('paddle', $data->driver);
        $this->assertFalse($data->trialEnabled);
        $this->assertEquals(7, $data->trialDays);
    }
}
