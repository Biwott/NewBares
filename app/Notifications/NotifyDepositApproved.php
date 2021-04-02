<?php

namespace App\Notifications;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyDepositApproved extends Notification
{
    use Queueable;

    public $deposit;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Deposit $deposit)
    {
        $this->deposit = $deposit;
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
            'title' => 'Deposit Approved!',
            'body' =>  ' Depost of ' . convertCurrency(User::find($this->deposit->user_id), $this->deposit->amount) . ' has been approved!',
            'footer' => 'Regards, Earnest Ventures'
        ];
    }
}
