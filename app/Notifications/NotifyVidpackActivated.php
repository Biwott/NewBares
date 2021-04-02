<?php

namespace App\Notifications;

use App\Models\Vidpack;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NotifyVidpackActivated extends Notification
{
    use Queueable;

    public $package;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Vidpack $package)
    {
        $this->package = $package;
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
            'title' => 'Video Package Purchased!',
            'body' =>  'Video Package of Ksh ' . number_format($this->package->cost, 0, '.', ',') . ' has been purchased!',
            'footer' => 'Regards, Earnest Ventures'
        ];
    }
}
