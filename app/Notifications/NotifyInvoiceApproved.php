<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyInvoiceApproved extends Notification
{
    use Queueable;

    public $withdrawal;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Withdrawal $withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'Withdrawal Approved!',
            'body' =>  ' Request of ' . convertCurrency(User::find($this->withdrawal->user_id), $this->withdrawal->amount) . ' has been approved! Kindly check your Phone for payment!',
            'footer' => 'Regards, Earnest Ventures'
        ];
    }
}
