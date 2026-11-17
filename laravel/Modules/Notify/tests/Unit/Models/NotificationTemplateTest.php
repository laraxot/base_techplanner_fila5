<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
namespace Modules\Notify\Tests\Unit\Models;

use Modules\Notify\Enums\NotificationTypeEnum;
use Modules\Notify\Models\NotificationTemplate;
use ReflectionClass;
>>>>>>> 6ed19256f (.)

/**
 * Unit tests must not bootstrap the application container.
 */
it('has correct fillable fields', function (): void {
<<<<<<< HEAD
=======
    $reflection = new ReflectionClass(NotificationTemplate::class);
>>>>>>> 6ed19256f (.)
    $instance = $reflection->newInstanceWithoutConstructor();

    $fillableProperty = $reflection->getProperty('fillable');
    $fillableProperty->setAccessible(true);

    $fillable = $fillableProperty->getValue($instance);

    $expectedFillable = [
        'name',
        'code',
        'description',
        'subject',
        'body_html',
        'body_text',
        'channels',
        'variables',
        'conditions',
        'preview_data',
        'metadata',
        'category',
        'is_active',
        'version',
        'tenant_id',
        'grapesjs_data',
        'type',
    ];

    expect($fillable)->toBe($expectedFillable);
});

it('has correct casts', function (): void {
<<<<<<< HEAD
=======
    $reflection = new ReflectionClass(NotificationTemplate::class);
>>>>>>> 6ed19256f (.)
    $instance = $reflection->newInstanceWithoutConstructor();

    $castsMethod = $reflection->getMethod('casts');
    $castsMethod->setAccessible(true);

    $casts = $castsMethod->invoke($instance);

    $expectedCasts = [
        'type' => NotificationTypeEnum::class,
        'preview_data' => 'array',
        'body_html' => 'string',
        'body_text' => 'string',
        'channels' => 'array',
        'variables' => 'array',
        'conditions' => 'array',
        'metadata' => 'array',
        'is_active' => 'boolean',
        'grapesjs_data' => 'array',
    ];

    expect($casts)->toBe($expectedCasts);
});

it('has translatable fields', function (): void {
<<<<<<< HEAD
=======
    $reflection = new ReflectionClass(NotificationTemplate::class);
>>>>>>> 6ed19256f (.)
    $instance = $reflection->newInstanceWithoutConstructor();

    $translatableProperty = $reflection->getProperty('translatable');
    $translatableProperty->setAccessible(true);

    $translatable = $translatableProperty->getValue($instance);

    $expectedTranslatable = [
        'subject',
        'body_text',
        'body_html',
    ];

    expect($translatable)->toBe($expectedTranslatable);
});
