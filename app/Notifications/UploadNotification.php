<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UploadNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $data;
    public $secondParam;

    public function __construct($data, $secondParam)
    {
        $this->data = $data;
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
                    ->line('first line: all from this data  =>  '. $this->data)
                    ->action('2nd line: archies Notification Action', url('/'))
                    ->line('3rd Line: lethma, Thank you for using our application!'. $this->secondParam);
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
