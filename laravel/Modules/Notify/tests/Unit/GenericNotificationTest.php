<?php

declare(strict_types=1);

<<<<<<< .merge_file_WI39kH
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Notifications\GenericNotification;
use Modules\Notify\Tests\TestCase;
=======
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Notifications\GenericNotification;
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_T27uqO

uses(TestCase::class);
// Basic unit tests focusing on business logic of recipient name resolution

describe('GenericNotification getRecipientName', function (): void {
    it('prefers getFullName() when available', function (): void {
        $notification = new GenericNotification('Title', 'Message');

        $notifiable = new class
        {
            public function getFullName(): string
            {
                return 'John Doe';
            }
        };

<<<<<<< .merge_file_WI39kH
        $ref = new ReflectionClass(GenericNotification::class);
=======
<<<<<<< HEAD
=======
        $ref = new ReflectionClass(GenericNotification::class);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_T27uqO
        $method = $ref->getMethod('getRecipientName');
        $method->setAccessible(true);

        expect($method->invoke($notification, $notifiable))->toBe('John Doe');
    });

    it('uses Eloquent model full_name when present and non-empty', function (): void {
        $notification = new GenericNotification('Title', 'Message');

        $model = new class extends Model
        {
            protected $attributes = [
                'full_name' => 'Jane Roe',
            ];
        };

<<<<<<< .merge_file_WI39kH
        $ref = new ReflectionClass(GenericNotification::class);
=======
<<<<<<< HEAD
=======
        $ref = new ReflectionClass(GenericNotification::class);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_T27uqO
        $method = $ref->getMethod('getRecipientName');
        $method->setAccessible(true);

        expect($method->invoke($notification, $model))->toBe('Jane Roe');
    });

    it('falls back to first_name then name then default', function (): void {
        $notification = new GenericNotification('Title', 'Message');

        // first_name present
        $model1 = new class extends Model
        {
            protected $attributes = ['first_name' => 'Alice'];
        };
        // name present
        $model2 = new class extends Model
        {
            protected $attributes = ['name' => 'Bob'];
        };
        // none present
        $model3 = new class extends Model
        {
            protected $attributes = [];
        };

<<<<<<< .merge_file_WI39kH
        $ref = new ReflectionClass(GenericNotification::class);
=======
<<<<<<< HEAD
=======
        $ref = new ReflectionClass(GenericNotification::class);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_T27uqO
        $method = $ref->getMethod('getRecipientName');
        $method->setAccessible(true);

        expect($method->invoke($notification, $model1))->toBe('Alice');
        expect($method->invoke($notification, $model2))->toBe('Bob');
        expect($method->invoke($notification, $model3))->toBe('Utente');
    });
});