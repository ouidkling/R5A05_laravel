<?php

namespace App\Listeners;

use App\Events\PresetCreated;
use App\Models\User;
use App\Notifications\NewPreset;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPresetCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PresetCreated $event): void
    {
        foreach (User::whereNot('id', $event->preset->user_id)->cursor() as $user) {
            $user->notify(new NewPreset($event->preset));
        }
    }
}
