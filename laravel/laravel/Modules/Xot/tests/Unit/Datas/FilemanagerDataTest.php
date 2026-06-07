<?php

declare(strict_types=1);

namespace Modules\Xot\Tests\Unit\Datas;

use Modules\Xot\Datas\FilemanagerData;
use PHPUnit\Framework\TestCase;

class FilemanagerDataTest extends TestCase
{
    public function testCanCreateFilemanagerDataWithDefaults(): void
    {
        $data = FilemanagerData::make();
        $this->assertInstanceOf(FilemanagerData::class, $data);
        $this->assertEquals('public', $data->disk);
    }

    public function testCanCreateFilemanagerDataWithCustomValues(): void
    {
        $data = new FilemanagerData(
            disk: 's3',
            maxSize: 50
        );
        $this->assertEquals('s3', $data->disk);
        $this->assertEquals(50, $data->maxSize);
    }
}
