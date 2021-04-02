<?php

namespace App\Http\Livewire\User\Trade;

use App\Models\Tradedrawal;
use App\Notifications\NotifyTradedrawalPending;
use App\Notifications\NotifyVideoPending;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WithdrawTrade extends Component
{

    public $amount = '';
    public function updatedAmount()
    {
        $this->validate([
            'amount' => 'integer|between:1,30000',
        ]);
    }
    public function withdrawFunds()
    {
        $data = $this->validate([
            'amount' => 'integer|between:1,30000',
        ]);
        $user = Auth::user();

        if ($user->trade_status == 0) {
            $userBalance = $user->trade_balance;
            if ($userBalance >= $data['amount']) {
                $amount = $data['amount'];
                $tradedrawal['user_id'] = $user->id;
                $tradedrawal['amount'] = $amount;
                $tradedrawal['details'] =  setSessionId();
                $tradedrawal['code'] = $tradedrawal['details'];
                $tradedrawal['status'] = 0;
                $newWithdraw = Tradedrawal::create($tradedrawal);
                $balance = $userBalance - $tradedrawal['amount'];
                $user->update([
                    'trade_status' => 1,
                    'trade_balance' => $balance
                ]);                
                $user->notify(new NotifyTradedrawalPending($newWithdraw));
                $message =  ['type' => 'success',  'message' => "Request Successfully Sent! Kindly await approval"];
                session(['notify' => $message]);
                return redirect()->route('user.trade.withdrawal.history');
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => "Insufficient Trade Balance!"]
                );
            }
        } elseif ($user->trade_status) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Invalid Request! You have another Pending Trade Withdrawal!"]
            );
        }
    }

    public function render()
    {
        return view('livewire.user.trade.withdraw-trade');
    }
}
