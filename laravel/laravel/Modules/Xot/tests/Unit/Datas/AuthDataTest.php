<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Datas;

use Modules\Xot\Datas\AuthData;
use PHPUnit\Framework\TestCase;

class AuthDataTest extends TestCase
{
    public function testCanCreateAuthDataWithDefaults(): void
    {
        $data = AuthData::make();
        $this->assertInstanceOf(AuthData::class, $data);
        $this->assertEquals('web', $data->guard);
    }

    public function testCanCreateAuthDataWithCustomValues(): void
    {
        $data = new AuthData(
            guard: 'api',
            verifyEmail: false,
            passwordResetTimeout: 120
        );
        $this->assertEquals('api', $data->guard);
        $this->assertFalse($data->verifyEmail);
        $this->assertEquals(120, $data->passwordResetTimeout);
    }
}
