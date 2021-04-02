<?php

namespace App\Notifications;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyInvestmentBonus extends Notification
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
        $this->bonus = "Ksh " . number_format($package->earning, 2, '.', ',');
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
            'title' => 'Investment Bonus!',
            'body' =>  ' You have received your investment bonus of  ' . $this->bonus . ' ! Invest to earn even more!',
            'footer' => 'Regards, Earnest Ventures'
        ];
    }
}
