<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas;

use Modules\Notify\Datas\SmsData;
use PHPUnit\Framework\TestCase;

class SmsDataTest extends TestCase
{
    public function testCanCreateSmsDataWithDefaults(): void
    {
        $data = new SmsData();
        $this->assertInstanceOf(SmsData::class, $data);
        $this->assertEquals('', $data->from);
        $this->assertEquals('', $data->recipient);
        $this->assertEquals('', $data->body);
    }

    public function testCanCreateSmsDataWithCustomValues(): void
    {
        $data = new SmsData([
            'from' => '+1234567890',
            'recipient' => '+0987654321',
            'body' => 'Test message'
        ]);
        $this->assertEquals('+1234567890', $data->from);
        $this->assertEquals('+0987654321', $data->recipient);
        $this->assertEquals('Test message', $data->body);
    }

    public function testCanCreateSmsDataUsingFromMethod(): void
    {
        $data = SmsData::from([
            'from' => '+1111111111',
            'recipient' => '+2222222222',
            'body' => 'Hello World'
        ]);
        $this->assertEquals('+1111111111', $data->from);
        $this->assertEquals('+2222222222', $data->recipient);
    }
}
