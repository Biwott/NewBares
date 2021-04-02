<?php

namespace App\Mail;

use App\Models\Deposit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DepositApproved extends Mailable
{
    use Queueable, SerializesModels;

    protected $deposit;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Deposit $deposit)
    {
        $this->deposit = $deposit->attributesToArray();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.deposit.approved')
            ->with([
                'deposit' => $this->deposit,
            ]);
    }
}
