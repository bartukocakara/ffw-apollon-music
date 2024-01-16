<?php

namespace App\Providers;

use App\Events\AsticaDescribeEvent;
use App\Events\SoundrawMusicComposeEvent;
use App\Events\SummarifyZeroShotEvent;
use App\Listeners\AsticaDescribeListener;
use App\Listeners\SoundrawMusicComposeListener;
use App\Listeners\SummarifyZeroShotListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(
            AsticaDescribeEvent::class,
            [AsticaDescribeListener::class, 'handle']
        );
        Event::listen(
            SoundrawMusicComposeEvent::class,
            [SoundrawMusicComposeListener::class, 'handle']
        );
        Event::listen(
            SummarifyZeroShotEvent::class,
            [SummarifyZeroShotListener::class, 'handle']
        );
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
