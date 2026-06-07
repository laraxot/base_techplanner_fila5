<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Datas;

use Modules\Xot\Datas\MailData;
use PHPUnit\Framework\TestCase;

class MailDataTest extends TestCase
{
    public function testCanCreateMailDataWithDefaults(): void
    {
        $data = MailData::make();
        $this->assertInstanceOf(MailData::class, $data);
        $this->assertEquals('smtp', $data->driver);
    }

    public function testCanCreateMailDataWithCustomValues(): void
    {
        $data = new MailData(
            driver: 'mailgun',
            smtpConfig: ['host' => 'smtp.mailgun.org'],
            fromConfig: ['address' => 'hello@example.com', 'name' => 'App']
        );
        $this->assertEquals('mailgun', $data->driver);
        $this->assertEquals('smtp.mailgun.org', $data->smtpConfig['host']);
    }
}
