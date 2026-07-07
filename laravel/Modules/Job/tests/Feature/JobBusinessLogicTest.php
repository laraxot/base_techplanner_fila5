<?php

declare(strict_types=1);

<<<<<<< HEAD

use function Safe\json_encode;

describe('Job Business Logic', function () {
    it('can instantiate job with basic attributes', function () {
        $job = new Job([
            'queue' => 'default',
            'payload' => json_encode(['displayName' => 'App\Jobs\ProcessUserJob']),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

        expect($job)
            ->toBeInstanceOf(Job::class)
            ->and($job->queue)->toBe('default')
            ->and($job->attempts)->toBe(0);
    });

    it('returns waiting status when not reserved', function () {
        $job = new Job([
=======
use Illuminate\Support\Carbon;
use Modules\Job\Models\Job;

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

        $this->assertDatabaseHas('jobs', [
            'id' => $job->id,
            'queue' => 'default',
            'attempts' => 0,
        ]);
    });

    it('can manage job status correctly', function () {
        // Job in attesa
        $waitingJob = Job::create([
>>>>>>> 6ed19256f (.)
            'queue' => 'high',
            'payload' => json_encode(['displayName' => 'TestJob']),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->status)->toBe('waiting');
    });

    it('returns running status when reserved', function () {
        $job = new Job([
=======
        expect($waitingJob->status)->toBe('waiting');

        // Job in esecuzione
        $runningJob = Job::create([
>>>>>>> 6ed19256f (.)
            'queue' => 'high',
            'payload' => json_encode(['displayName' => 'TestJob']),
            'attempts' => 1,
            'reserved_at' => now()->timestamp,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->status)->toBe('running');
    });

    it('extracts display name from payload', function () {
        $job = new Job([
=======
        expect($runningJob->status)->toBe('running');
    });

    it('can handle job attempts and retries', function () {
        $job = Job::create([
            'queue' => 'emails',
            'payload' => json_encode(['displayName' => 'SendEmailJob']),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

        // Primo tentativo
        $job->update([
            'attempts' => 1,
            'reserved_at' => now()->timestamp,
        ]);

        expect($job->attempts)->toBe(1)->and($job->status)->toBe('running');

        // Secondo tentativo
        $job->update([
            'attempts' => 2,
            'reserved_at' => null,
            'available_at' => now()->addMinutes(5)->timestamp,
        ]);

        expect($job->attempts)->toBe(2)->and($job->status)->toBe('waiting');
    });

    it('can extract display name from payload', function () {
        $job = Job::create([
>>>>>>> 6ed19256f (.)
            'queue' => 'notifications',
            'payload' => json_encode([
                'displayName' => 'App\Jobs\SendNotificationJob',
                'job' => 'Illuminate\Queue\CallQueuedHandler@call',
<<<<<<< HEAD
=======
                'data' => ['user_id' => 456],
>>>>>>> 6ed19256f (.)
            ]),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

        expect($job->display_name)->toBe('App\Jobs\SendNotificationJob');
    });

<<<<<<< HEAD
    it('handles complex payload structures', function () {
=======
    it('can handle complex payload structures', function () {
>>>>>>> 6ed19256f (.)
        $complexPayload = [
            'displayName' => 'App\Jobs\ComplexProcessingJob',
            'job' => 'Illuminate\Queue\CallQueuedHandler@call',
            'maxTries' => 5,
<<<<<<< HEAD
            'data' => [
                'user_id' => 789,
                'options' => ['priority' => 'high'],
            ],
        ];

        $job = new Job([
=======
            'maxExceptions' => 1,
            'timeout' => 300,
            'data' => [
                'user_id' => 789,
                'process_type' => 'batch_processing',
                'options' => [
                    'priority' => 'high',
                    'notify_on_completion' => true,
                    'retry_strategy' => 'exponential_backoff',
                ],
                'metadata' => [
                    'source' => 'user_upload',
                    'file_size' => 1024000,
                    'processing_requirements' => ['validation', 'transformation', 'storage'],
                ],
            ],
            'tags' => ['user_processing', 'batch', 'high_priority'],
        ];

        $job = Job::create([
>>>>>>> 6ed19256f (.)
            'queue' => 'processing',
            'payload' => json_encode($complexPayload),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->display_name)->toBe('App\Jobs\ComplexProcessingJob')
            ->and($job->queue)->toBe('processing');
    });

    it('handles job with future available_at', function () {
        $futureTime = now()->addHours(2);

        $job = new Job([
=======
        expect($job->display_name)->toBe('App\Jobs\ComplexProcessingJob')->and($job->queue)->toBe('processing');
    });

    it('can handle job scheduling and delays', function () {
        $futureTime = now()->addHours(2);

        $job = Job::create([
>>>>>>> 6ed19256f (.)
            'queue' => 'scheduled',
            'payload' => json_encode(['displayName' => 'ScheduledJob']),
            'attempts' => 0,
            'available_at' => $futureTime->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->available_at)->toBeGreaterThan(now()->timestamp)
            ->and($job->status)->toBe('waiting');
    });

    it('handles different queue names', function () {
        $highPriorityJob = new Job(['queue' => 'high', 'payload' => '{}', 'attempts' => 0, 'available_at' => now()->timestamp]);
        $lowPriorityJob = new Job(['queue' => 'low', 'payload' => '{}', 'attempts' => 0, 'available_at' => now()->timestamp]);
        $defaultJob = new Job(['queue' => 'default', 'payload' => '{}', 'attempts' => 0, 'available_at' => now()->timestamp]);

        expect($highPriorityJob->queue)->toBe('high')
            ->and($lowPriorityJob->queue)->toBe('low')
            ->and($defaultJob->queue)->toBe('default');
    });

    it('returns null for invalid payload', function () {
        $job = new Job([
            'queue' => 'default',
            'payload' => 'invalid-json',
=======
        expect($job->available_at)->toBeGreaterThan(now()->timestamp)->and($job->status)->toBe('waiting');
    });

    it('can manage job reservation and processing', function () {
        $job = Job::create([
            'queue' => 'high',
            'payload' => json_encode(['displayName' => 'PriorityJob']),
>>>>>>> 6ed19256f (.)
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

<<<<<<< HEAD
        expect($job->display_name)->toBeNull();
    });

    it('model has correct fillable attributes', function () {
        $job = new Job;
        $fillable = $job->getFillable();

        expect($fillable)->toContain('queue')
            ->and($fillable)->toContain('payload')
            ->and($fillable)->toContain('attempts')
            ->and($fillable)->toContain('available_at');
=======
        // Riserva il job per l'elaborazione
        $reservationTime = now();
        $job->update([
            'reserved_at' => $reservationTime->timestamp,
            'attempts' => 1,
        ]);

        expect($job->status)->toBe('running')->and($job->attempts)->toBe(1)->and($job->reserved_at)->not->toBeNull();

        // Rilascia il job (fallimento o completamento)
        $job->update([
            'reserved_at' => null,
            'attempts' => 2,
            'available_at' => now()->addMinutes(10)->timestamp, // Delay per retry
        ]);

        expect($job->status)->toBe('waiting')->and($job->attempts)->toBe(2)->and($job->reserved_at)->toBeNull();
    });

    it('can handle job priority queues', function () {
        $highPriorityJob = Job::create([
            'queue' => 'high',
            'payload' => json_encode(['displayName' => 'HighPriorityJob']),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

        $lowPriorityJob = Job::create([
            'queue' => 'low',
            'payload' => json_encode(['displayName' => 'LowPriorityJob']),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

        $defaultJob = Job::create([
            'queue' => 'default',
            'payload' => json_encode(['displayName' => 'DefaultJob']),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

        expect($highPriorityJob->queue)
            ->toBe('high')
            ->and($lowPriorityJob->queue)
            ->toBe('low')
            ->and($defaultJob->queue)
            ->toBe('default');
    });

    it('can handle job cleanup and maintenance', function () {
        // Job completato (reserved_at impostato ma job non più attivo)
        $completedJob = Job::create([
            'queue' => 'default',
            'payload' => json_encode(['displayName' => 'CompletedJob']),
            'attempts' => 1,
            'reserved_at' => now()->subHours(1)->timestamp,
            'available_at' => now()->subHours(1)->timestamp,
        ]);

        // Job fallito con troppi tentativi
        $failedJob = Job::create([
            'queue' => 'emails',
            'payload' => json_encode(['displayName' => 'FailedJob']),
            'attempts' => 5,
            'available_at' => now()->subMinutes(30)->timestamp,
        ]);

        // Verifica che i job siano gestibili per la pulizia
        expect($completedJob->reserved_at)
            ->toBeLessThan(now()->subMinutes(30)->timestamp)
            ->and($failedJob->attempts)
            ->toBeGreaterThanOrEqual(5);
    });

    it('can validate job payload integrity', function () {
        // Payload valido
        $validJob = Job::create([
            'queue' => 'default',
            'payload' => json_encode(['displayName' => 'ValidJob']),
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

        expect($validJob->display_name)->not->toBeNull();

        // Payload non valido (non JSON)
        $invalidJob = Job::create([
            'queue' => 'default',
            'payload' => 'invalid-json-payload',
            'attempts' => 0,
            'available_at' => now()->timestamp,
        ]);

        expect($invalidJob->display_name)->toBeNull();
    });

    it('can handle job batch operations', function () {
        // Crea un batch di job
        $batchJobs = [];
        for ($i = 1; $i <= 5; $i++) {
            $batchJobs[] = Job::create([
                'queue' => 'batch',
                'payload' => json_encode([
                    'displayName' => 'BatchJob',
                    'data' => ['batch_id' => 1, 'item_id' => $i],
                ]),
                'attempts' => 0,
                'available_at' => now()->timestamp,
            ]);
        }

        expect($batchJobs)->toHaveCount(5);

        foreach ($batchJobs as $job) {
            expect($job->queue)
                ->toBe('batch')
                ->and($job->display_name)
                ->toBe('BatchJob')
                ->and($job->status)
                ->toBe('waiting');
        }
>>>>>>> 6ed19256f (.)
    });
});
