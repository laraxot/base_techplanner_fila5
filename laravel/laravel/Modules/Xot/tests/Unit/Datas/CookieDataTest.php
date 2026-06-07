<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Datas;

use Modules\Xot\Datas\CookieData;
use PHPUnit\Framework\TestCase;

class CookieDataTest extends TestCase
{
    public function testCanCreateCookieDataWithDefaults(): void
    {
        $data = CookieData::make();
        $this->assertInstanceOf(CookieData::class, $data);
        $this->assertFalse($data->accept);
        $this->assertEquals(365, $data->durationDays);
    }

    public function testCanCreateCookieDataWithCustomValues(): void
    {
        $data = new CookieData(
            accept: true,
            durationDays: 30,
            bannerStyle: 'top'
        );
        $this->assertTrue($data->accept);
        $this->assertEquals(30, $data->durationDays);
        $this->assertEquals('top', $data->bannerStyle);
    }
}
