<?php

declare(strict_types=1);

<<<<<<< .merge_file_v7QUHP
use Illuminate\Database\Eloquent\Builder;
use Modules\Notify\Models\NotificationType;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
=======
<<<<<<< HEAD
>>>>>>> .merge_file_3EX3lE

uses(TestCase::class);
describe('NotificationType Business Logic', function (): void {
    test('notification type extends eloquent model', function (): void {
        $notificationType = new NotificationType;

        Assert::assertContains('slug', $notificationType->getFillable());
        Assert::assertFalse($notificationType->exists);
    });

<<<<<<< .merge_file_v7QUHP
    test('notification type has expected fillable fields', function (): void {
        $notificationType = new NotificationType;
=======
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
>>>>>>> .merge_file_3EX3lE
        $expectedFillable = [
            'name',
            'slug',
            'description',
            'category',
            'is_active',
            'channels',
            'settings',
            'template',
        ];

<<<<<<< .merge_file_v7QUHP
        Assert::assertSame($expectedFillable, $notificationType->getFillable());
    });

    test('notification type can store basic information', function (): void {
        $notificationType = new NotificationType;
        $notificationType->name = 'Email Verification';
        $notificationType->description = 'Email verification notification type';
        $notificationType->template = 'email-verification-template';

        Assert::assertSame('Email Verification', $notificationType->name);
        Assert::assertSame('Email verification notification type', $notificationType->description);
        Assert::assertSame('email-verification-template', $notificationType->template);
    });

    test('notification type model can be instantiated without errors', function (): void {
        $notificationType = new NotificationType;
        Assert::assertFalse($notificationType->exists);
    });

    test('notification type can be queried', function (): void {
        $query = NotificationType::query();
        Assert::assertInstanceOf(Builder::class, $query);
=======
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
>>>>>>> .merge_file_3EX3lE
    });
});