<?php

namespace App\Notifications;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyPackageActivated extends Notification
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
            'title' => 'Package Purchased!',
            'body' =>  ' Package of Ksh ' . number_format($this->package->cost, 0, '.', ',') . ' has been purchased! Your waiting ID is #' . $this->package->count,
            'footer' => 'Regards, Earnest Ventures'
        ];
    }
}
