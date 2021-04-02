<?php

namespace App\Http\Livewire\User\Withdrawal;

use App\Mail\InvoicePending;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\NotifyInvoicePending;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class WithdrawFunds extends Component
{

    public $amount = '';
    public $phone = '';
    public $receivable = '';

    public function mount()
    {
        $this->phone = Auth::user()->phone;
    }


    public function updatedAmount()
    {
        $this->receivable = '';
        $validator = $this->validate([
            'amount' => 'integer|between:500,30000',
        ]);
        if ($validator['amount']) {
            $this->receivable = $validator['amount'] * 0.978;
        }
    }

    public function withdrawFunds()
    {
        $data = $this->validate([
            'amount' => 'integer|between:500,30000',
        ]);
        $user = User::findOrFail(Auth::id());
        if ($user->active > 0) {
            if ($user->status == 1) {
                $userBalance = $user->balance;
                if ($userBalance >= $data['amount']) {
                    $reqAmount = $data['amount'];
                    $withdraw['user_id'] = Auth::id();
                    $withdraw['currency_id'] = 1;
                    $withdraw['mpesa_id'] = '0';
                    $withdraw['amount'] = $reqAmount;
                    $withdraw['charge'] = $reqAmount * 0.022;
                    $withdraw['final_amount'] = $reqAmount * 0.978;
                    $withdraw['details'] = setSessionId();
                    $withdraw['code'] = $withdraw['details'];
                    $withdraw['status'] = 0;
                    $newWithdraw = Withdrawal::create($withdraw);
                    $balance = $userBalance - $withdraw['amount'];
                    $user->update([
                        'status' => 2,
                        'balance' => $balance
                    ]);
                    $user->notify(new NotifyInvoicePending($newWithdraw));
                    // $message = "EARNEST withdrawal of Ksh " . number_format($withdraw['final_amount'], 2) . " of Request ID: " . $newWithdraw->code . " is Pending. Kindly await Approval.";
                    // sendSMS($user->phone, $message);
                    $admiMessage = "New Withdrawal request from " . $user->phone . " Username:" . $user->username . " of Ksh " . number_format($withdraw['final_amount'], 2) . ".";
                    sendSMS('+254714871633', $admiMessage);
                    Mail::to($user->email)->send(new InvoicePending($newWithdraw));
                    $message =  ['type' => 'success',  'message' => "Request Successfully Sent! Kindly await approval"];
                    session(['notify' => $message]);
                    return redirect()->route('user.withdrawal.history');
                } else {

                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => 'Insufficient Account Balance!']
                    );
                    return;
                }
            } elseif ($user->status == 2) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Invalid Request! You have another Pending Withdrawal!']
                );
                return;
            }
        } else {

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Sorry you have been Banned from System!']
            );
            return;
        }
    }

    public function render()
    {
        return view('livewire.user.withdrawal.withdraw-funds');
    }
}
