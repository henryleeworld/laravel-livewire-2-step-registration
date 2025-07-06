<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ListingMessageNotification extends Notification
{
    use Queueable;

    public $name;
    public $email;
    public $listingTitle;
    public $messageText;

    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
        $this->name = $message['name'];
        $this->email = $message['email'];
        $this->listingTitle = $message['listingTitle'];
        $this->messageText = $message['messageText'];
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
                    ->line($this->name . __(' (:email) has sent you a message about :listing_title', ['email' => $this->email, 'listing_title' => $this->listingTitle]))
                    ->line($this->messageText)
                    ->line(__('Thank you for using our application!'));
    }
}
