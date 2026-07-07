<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
use Illuminate\Support\Carbon;
use Modules\Job\Models\Job;
>>>>>>> 6ed19256f (.)

describe('Job Business Logic', function () {
    it('can create job with basic information', function () {
        $jobData = [
            'queue' => 'default',
            'payload' => json_encode([
                'displayName' => 'App\Jobs\ProcessUserJob',
                'job' => 'Illuminate\Queue\CallQueuedHandler@call',
                'maxTries' => 3,
                'maxExceptions' => 0,
                'timeout' => 120,
                'data' => ['user_id' => 123],
            ]),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ];

        $job = Job::create($jobData);

        expect($job)
            ->toBeInstanceOf(Job::class)
            ->and($job->queue)
            ->toBe('default')
            ->and($job->attempts)
            ->toBe(0)
            ->and($job->reserved_at)
            ->toBeNull();
    });
<<<<<<< HEAD
});
=======
});
>>>>>>> 6ed19256f (.)
