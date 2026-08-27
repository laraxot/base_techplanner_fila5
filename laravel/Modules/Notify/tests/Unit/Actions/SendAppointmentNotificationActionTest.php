<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;

<<<<<<< .merge_file_gv4f06
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> .merge_file_U5dSxy
use Illuminate\Support\Facades\Log;
use Modules\Notify\Actions\SendAppointmentNotificationAction;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< .merge_file_gv4f06
uses(\Modules\Notify\Tests\TestCase::class);
=======
uses(TestCase::class)->group('notify-db');

function sendAppointmentNotificationTestModel(int $patientId = 1): Model
{
    $appointment = new class() extends Model
    {
        protected $guarded = [];

        public $timestamps = false;
    };
    $appointment->setAttribute('patient_id', $patientId);

    return $appointment;
}
>>>>>>> .merge_file_U5dSxy

test('send appointment notification returns false and logs info when models are missing', function () {
    Log::shouldReceive('info')->once();

    $result = app(SendAppointmentNotificationAction::class)->execute(
<<<<<<< .merge_file_gv4f06
        appointment: (object) ['patient_id' => 1],
=======
        appointment: sendAppointmentNotificationTestModel(),
>>>>>>> .merge_file_U5dSxy
        type: 'reminder',
    );

    Assert::assertFalse($result);
});
