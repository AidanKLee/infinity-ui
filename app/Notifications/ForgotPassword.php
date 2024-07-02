<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ForgotPassword extends Notification
{
    use Queueable;

    public $token;
    public $email;

    /**
     * Create a new notification instance.
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
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
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Password reset request for your account')
            ->line(new HtmlString('<h2 style="font-weight:700; font-size:25px; color:#4C5661; margin:0 0 15px 0;">Hi ' . $notifiable->firstname . ',</h2>'))
            ->line(new HtmlString('<p>This is to inform you that a request has been received to change the password for your account.</p>'))
            ->action('Reset Your Password', url(config('app.url').route('password-reset', [
                'token' => $this->token,
                'email' => $this->email
            ], false)))
            ->line(new HtmlString('<p>If you did not request a password change, simply ignore this email.</p>'));
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
