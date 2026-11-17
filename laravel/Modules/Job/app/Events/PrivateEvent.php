<?php

declare(strict_types=1);

namespace Modules\Job\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PrivateEvent implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public string $message,
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> 6ed19256f (.)

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): Channel
    {
<<<<<<< HEAD
        return new PrivateChannel('private.'.auth()->id());
=======
        return new PrivateChannel('private.' . auth()->id());
>>>>>>> 6ed19256f (.)
    }
}
