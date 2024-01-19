<?php

namespace App\Providers;

use App\Events\OrderPlaced;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserRegistered;
use App\Listeners\SendWelcomeEmail;
use App\Listeners\UpdateInventoryAboutOrder;
use App\Listeners\UpdateVendorAboutOrder;

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
        UserRegistered::class => [
            SendWelcomeEmail::class,
        ],
        'App\Events\NewMessageEvent' => [
            'App\Listeners\SendNewMessageNotification',
        ],
        OrderPlaced::class=>[
            UpdateVendorAboutOrder::class,
            UpdateInventoryAboutOrder::class

        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        // protected $listen 
        // true為自動註冊事件 $listen可以省略
        return false;
    }
}
