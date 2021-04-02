<?php

namespace App\Notifications;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyReferalBonus extends Notification
{
    use Queueable;

    public $package;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Package $package)
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
            'title' => 'Referal Bonus!',
            'body' =>  ' You have received a referal bonus of  Ksh ' . number_format($this->package->cost * ($this->package->commision / 100), 0, '.', ',') . '! Refer earn even more!',
            'footer' => 'Regards, Earnest Ventures'
        ];
    }
}
