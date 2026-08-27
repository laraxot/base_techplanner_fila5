<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;
<<<<<<< .merge_file_hTncBD
=======

>>>>>>> .merge_file_L3rlzb
use Modules\Notify\Models\BaseModel;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Models\NotificationTemplateVersion;
use Modules\Notify\Tests\TestCase;
<<<<<<< .merge_file_DcNuFl
=======
use PHPUnit\Framework\Assert;
<<<<<<< .merge_file_hTncBD

uses(\Modules\Notify\Tests\TestCase::class);
=======
>>>>>>> .merge_file_x0r0MP
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('notify-db');
>>>>>>> .merge_file_L3rlzb

it('extends base model', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

    Assert::assertInstanceOf(BaseModel::class, $version);
});

it('uses updater trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

    Assert::assertContains('Modules\\Xot\\Traits\\Updater', $traits);
});

it('has correct fillable attributes', function (): void {
    $expectedFillable = [
        'template_id',
        'subject',
        'body_html',
        'body_text',
        'channels',
        'variables',
        'conditions',
        'version',
        'created_by',
        'change_notes',
    ];

    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $instance = $reflection->newInstanceWithoutConstructor();
    $fillableProperty = $reflection->getProperty('fillable');
    $fillableProperty->setAccessible(true);
    $fillable = $fillableProperty->getValue($instance);

    Assert::assertSame($expectedFillable, $fillable);
});

it('has correct casts', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $instance = $reflection->newInstanceWithoutConstructor();
    $castsMethod = $reflection->getMethod('casts');
    $castsMethod->setAccessible(true);
<<<<<<< .merge_file_hTncBD
    $casts = \assertNotifyArray($castsMethod->invoke($instance));
=======
    $casts = XotBasePest::assertArray($castsMethod->invoke($instance));
>>>>>>> .merge_file_L3rlzb
    Assert::assertSame('array', $casts['channels'] ?? null);
    Assert::assertSame('array', $casts['variables'] ?? null);
    Assert::assertSame('array', $casts['conditions'] ?? null);
});

it('has template relationship method', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();
<<<<<<< .merge_file_DcNuFl

=======
<<<<<<< .merge_file_hTncBD

    });
=======
>>>>>>> .merge_file_x0r0MP
});
>>>>>>> .merge_file_L3rlzb

it('has restore method', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();
<<<<<<< .merge_file_DcNuFl

=======
<<<<<<< .merge_file_hTncBD

    });
=======
>>>>>>> .merge_file_x0r0MP
});
>>>>>>> .merge_file_L3rlzb

it('restore method returns NotificationTemplate', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

<<<<<<< .merge_file_hTncBD
        $method = new \ReflectionMethod($version, 'restore');
    $returnType = $method->getReturnType();

    Assert::assertNotNull($returnType);
    \assertReflectionTypeName($returnType, NotificationTemplate::class);
=======
    $method = new \ReflectionMethod($version, 'restore');
    $returnType = $method->getReturnType();

    Assert::assertNotNull($returnType);
    XotBasePest::assertReflectionTypeName($returnType, NotificationTemplate::class);
>>>>>>> .merge_file_L3rlzb
});

it('has expected table name', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

    Assert::assertSame('notification_template_versions', $version->getTable());
});

it('has expected primary key', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

    Assert::assertSame('id', $version->getKeyName());
});

it('uses timestamps', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $version = $reflection->newInstanceWithoutConstructor();

    Assert::assertTrue($version->usesTimestamps());
});

it('has uuids trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

    Assert::assertContains('Illuminate\\Database\\Eloquent\\Concerns\\HasUuids', $traits);
});

it('has factory trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

    Assert::assertContains('Modules\\Xot\\Traits\\HasFactory', $traits);
});

it('has media trait', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
    $traits = $reflection->getTraitNames();

    Assert::assertContains('Spatie\\MediaLibrary\\HasMedia', $traits);
});

it('has creator and updater relationships', function (): void {
<<<<<<< .merge_file_DcNuFl
    $version = new NotificationTemplateVersion();

=======
    $version = new NotificationTemplateVersion;
<<<<<<< .merge_file_hTncBD

        });

it('has media relationship', function (): void {
    $version = new NotificationTemplateVersion;

    });
=======
>>>>>>> .merge_file_x0r0MP
});

it('has media relationship', function (): void {
    $version = new NotificationTemplateVersion();

});
>>>>>>> .merge_file_L3rlzb
