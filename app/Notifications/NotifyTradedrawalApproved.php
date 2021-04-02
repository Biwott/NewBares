<?php

namespace App\Notifications;

use App\Models\Tradedrawal;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyTradedrawalApproved extends Notification
{
    use Queueable;

    public $tradedrawal;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Tradedrawal $tradedrawal)
    {
        $this->tradedrawal = $tradedrawal;
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
            'title' => 'Trade Withdrawal Approved!',
            'body' =>  ' Request#:'.$this->tradedrawal->code.' of ' . convertCurrency(User::find($this->tradedrawal->user_id), $this->tradedrawal->amount) . ' has been approved and credited to your balance!',
            'footer' => 'Regards, Earnest Ventures'
        ];
    }
}
