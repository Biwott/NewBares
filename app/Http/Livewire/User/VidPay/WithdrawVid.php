<?php

namespace App\Http\Livewire\User\VidPay;

use App\Mail\InvoicePending;
use App\Models\User;
use App\Models\Vidrawal;
use App\Notifications\NotifyInvoicePending;
use App\Notifications\NotifyVideoPending;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class WithdrawVid extends Component
{
    public $amount = '';


    public function updatedAmount()
    {

        $this->validate([
            'amount' => 'integer|between:1000,30000',
        ]);
    }

    public function withdrawFunds()
    {
        $data = $this->validate([
            'amount' => 'integer|between:1000,30000',
        ]);
        $user = Auth::user();
        if ($user->vid_status == 0) {
            $userBalance = $user->vid_balance;
            if ($userBalance >= $data['amount']) {
                $amount = $data['amount'];
                $vidraw['user_id'] = $user->id;
                $vidraw['amount'] = $amount;
                $vidraw['details'] =  setSessionId();
                $vidraw['code'] = $vidraw['details'];
                $vidraw['status'] = 0;
                $newVidraw = Vidrawal::create($vidraw);
                $balance = $userBalance - $vidraw['amount'];
                $user->update([
                    'vid_status' => 1,
                    'vid_balance' => $balance
                ]);
                $user->notify(new NotifyVideoPending($newVidraw));
                $message =  ['type' => 'success',  'message' => "Request Successfully Sent! Kindly await approval"];
                session(['notify' => $message]);
                return redirect()->route('user.vidpay.withdrawals');
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => "Insufficient Account Balance!"]
                );
            }
        } elseif ($user->vid_status == 1) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Invalid Request! You have another Pending Withdrawal!"]
            );
        }
    }
    public function render()
    {
        return view('livewire.user.vid-pay.withdraw-vid');
    }
}
