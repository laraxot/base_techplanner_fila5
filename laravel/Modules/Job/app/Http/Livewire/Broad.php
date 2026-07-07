<?php

declare(strict_types=1);

namespace Modules\Job\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Modules\Job\Events\PublicEvent;
use Modules\Xot\Actions\GetViewAction;

class Broad extends Component
{
<<<<<<< HEAD
    /**
     * Untyped to match HandlesEvents::$listeners.
     *
     * @var array<string, string>
     */
=======
    /** @var array<string, string> */
>>>>>>> 6ed19256f (.)
    protected $listeners = [
        'echo:public,PublicEvent' => 'notifyEvent',
    ];

    public function render(): Renderable
    {
        $view = app(GetViewAction::class)->execute();

        return view($view);
    }

    public function try(): void
    {
<<<<<<< HEAD
        session()->flash('message', 'try ['.now().']');
=======
        session()->flash('message', 'try [' . now() . ']');
>>>>>>> 6ed19256f (.)
        // OrderShipped::dispatch();
        // event(new PublicEvent('test'));
        PublicEvent::dispatch();
    }

    public function notifyEvent(): void
    {
<<<<<<< HEAD
        session()->flash('message', 'notifyEvent ['.now().']');
=======
        session()->flash('message', 'notifyEvent [' . now() . ']');
>>>>>>> 6ed19256f (.)
        dd('fine');

        // $this->showNewOrderNotification = true;
    }
}
