<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Notify\Tests\TestCase::class);
=======
namespace Modules\Notify\Tests\Unit\Models;

uses(TestCase::class);
>>>>>>> dev

use Modules\Notify\Models\BaseModel;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Models\NotificationTemplateVersion;
<<<<<<< HEAD

it('extends base model', function (): void {
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
use Modules\Notify\Tests\TestCase;

it('extends base model', function (): void {
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $version = $reflection->newInstanceWithoutConstructor();

    expect($version)->toBeInstanceOf(BaseModel::class);
});

it('uses updater trait', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $traits = $reflection->getTraitNames();

    expect($traits)->toContain('Modules\\Xot\\Traits\\Updater');
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

<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $instance = $reflection->newInstanceWithoutConstructor();
    $fillableProperty = $reflection->getProperty('fillable');
    $fillableProperty->setAccessible(true);
    $fillable = $fillableProperty->getValue($instance);

    expect($fillable)->toBe($expectedFillable);
});

it('has correct casts', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $instance = $reflection->newInstanceWithoutConstructor();
    $castsMethod = $reflection->getMethod('casts');
    $castsMethod->setAccessible(true);
    $casts = $castsMethod->invoke($instance);

    expect($casts)->toBeArray();
    expect($casts['channels'] ?? null)->toBe('array');
    expect($casts['variables'] ?? null)->toBe('array');
    expect($casts['conditions'] ?? null)->toBe('array');
});

it('has template relationship method', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $version = $reflection->newInstanceWithoutConstructor();

    expect(method_exists($version, 'template'))->toBeTrue();
});

it('has restore method', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $version = $reflection->newInstanceWithoutConstructor();

    expect(method_exists($version, 'restore'))->toBeTrue();
});

it('restore method returns NotificationTemplate', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $version = $reflection->newInstanceWithoutConstructor();

    expect(method_exists($version, 'restore'))->toBeTrue();

<<<<<<< HEAD
    $method = new ReflectionMethod($version, 'restore');
=======
    $method = new \ReflectionMethod($version, 'restore');
>>>>>>> dev
    $returnType = $method->getReturnType();

    expect($returnType)->not->toBeNull();
    expect($returnType?->getName())->toBe(NotificationTemplate::class);
});

it('has expected table name', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $version = $reflection->newInstanceWithoutConstructor();

    expect($version->getTable())->toBe('notification_template_versions');
});

it('has expected primary key', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $version = $reflection->newInstanceWithoutConstructor();

    expect($version->getKeyName())->toBe('id');
});

it('uses timestamps', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $version = $reflection->newInstanceWithoutConstructor();

    expect($version->usesTimestamps())->toBeTrue();
});

it('has uuids trait', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $traits = $reflection->getTraitNames();

    expect($traits)->toContain('Illuminate\\Database\\Eloquent\\Concerns\\HasUuids');
});

it('has factory trait', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $traits = $reflection->getTraitNames();

    expect($traits)->toContain('Modules\\Xot\\Traits\\HasFactory');
});

it('has media trait', function (): void {
<<<<<<< HEAD
    $reflection = new ReflectionClass(NotificationTemplateVersion::class);
=======
    $reflection = new \ReflectionClass(NotificationTemplateVersion::class);
>>>>>>> dev
    $traits = $reflection->getTraitNames();

    expect($traits)->toContain('Spatie\\MediaLibrary\\HasMedia');
});

it('has creator and updater relationships', function (): void {
    $version = new NotificationTemplateVersion;

    expect(method_exists($version, 'creator'))->toBeTrue();
    expect(method_exists($version, 'updater'))->toBeTrue();
});

it('has media relationship', function (): void {
    $version = new NotificationTemplateVersion;

    expect(method_exists($version, 'media'))->toBeTrue();
});
