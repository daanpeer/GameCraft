<?php

namespace App\Providers;

use App\Events\ServerDestroyed;
use App\Events\ServerPaused;
use App\Events\ServerStarted;
use App\Listeners\ServerDestroyedListener;
use App\Listeners\ServerPausedListener;
use App\Listeners\ServerRunningListener;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        ServerStarted::class => [
            ServerRunningListener::class
        ],
        ServerDestroyed::class => [
            ServerDestroyedListener::class
        ],
        ServerPaused::class => [
            ServerPausedListener::class
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
