<?php

namespace App\Mail;

use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceRejected extends Mailable
{
    use Queueable, SerializesModels;

    protected $withdrawal;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Withdrawal $withdrawal)
    {
        $this->withdrawal = $withdrawal->attributesToArray();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.withdrawal.rejected')
            ->with('withdrawal', $this->withdrawal);
    }
}
