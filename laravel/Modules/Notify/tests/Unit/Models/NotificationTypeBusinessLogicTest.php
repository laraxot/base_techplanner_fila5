<?php

declare(strict_types=1);

<<<<<<< HEAD

describe('NotificationType Business Logic', function () {
    test('notification type extends eloquent model', function () {
        expect(is_subclass_of(NotificationType::class, Model::class))->toBeTrue();
    });

    test('notification type has expected fillable fields', function () {
        $reflection = new \ReflectionClass(NotificationType::class);
        $property = $reflection->getProperty('fillable');
        $property->setAccessible(true);

=======
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\NotificationType;

describe('NotificationType Business Logic', function () {
    test('notification type extends eloquent model', function () {
        expect(NotificationType::class)->toBeSubclassOf(Model::class);
    });

    test('notification type has expected fillable fields', function () {
        $notificationType = new NotificationType;
>>>>>>> 6ed19256f (.)
        $expectedFillable = [
            'name',
            'description',
            'template',
        ];

<<<<<<< HEAD
        expect($property->getValue($reflection->newInstanceWithoutConstructor()))->toEqual($expectedFillable);
    });

    test('notification type model structure is correct', function () {
        // Verify class exists and extends Model
        expect(class_exists(NotificationType::class))->toBeTrue();
        expect(is_subclass_of(NotificationType::class, Model::class))->toBeTrue();
=======
        expect($notificationType->getFillable())->toEqual($expectedFillable);
    });

    test('notification type can store basic information', function () {
        $notificationType = new NotificationType;
        $notificationType->name = 'Email Verification';
        $notificationType->description = 'Email verification notification type';
        $notificationType->template = 'email-verification-template';

        expect($notificationType->name)->toBe('Email Verification');
        expect($notificationType->description)->toBe('Email verification notification type');
        expect($notificationType->template)->toBe('email-verification-template');
    });

    test('notification type model can be instantiated without errors', function () {
        $notificationType = new NotificationType;

        expect($notificationType)->toBeInstanceOf(NotificationType::class);
        expect($notificationType)->toBeInstanceOf(Model::class);
    });

    test('notification type can be queried', function () {
        $query = NotificationType::query();

        expect($query)->toBeInstanceOf(Builder::class);
>>>>>>> 6ed19256f (.)
    });
});
