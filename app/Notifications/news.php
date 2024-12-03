<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class news extends Notification
{
    use Queueable;
    private $tools;

    /**
     * Create a new notification instance.
     */
    public function __construct($tools)
    {
        $this->tools= $tools;

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
        ->greeting($this->tools['greeting'])
        ->line($this->tools['body'])
        ->action($this->tools['actiontext'], $this->tools['actionurl'])
        ->line($this->tools['lastline']);

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
