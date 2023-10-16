<?php

namespace App\Notifications;

use App\Models\Preset;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPreset extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Preset $preset)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("New Preset from {$this->preset->user->name}")
                    ->greeting("New Preset from {$this->preset->user->name}")
                    ->line(Str::limit($this->preset->name, 50))
                    ->action('Go to website', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
