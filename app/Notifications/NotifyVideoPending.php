<?php

namespace App\Notifications;

use App\Models\Vidrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NotifyVideoPending extends Notification
{
    use Queueable;

    public $vidrawal;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Vidrawal $vidrawal)
    {
        $this->vidrawal = $vidrawal;
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
            'title' => 'Video Withdrawal Pending!',
            'body' =>  ' Video Withdrawal Request'.$this->vidrawal->code.' of ' . convertCurrency(Auth::user(), $this->vidrawal->amount) . ' has been received! Kindly wait as we approve!',
            'footer' => 'Regards, Earnest Ventures'
        ];
    }
}
