<?php

namespace App\Http\Livewire\User\Trade;

use App\Models\Pair;
use App\Models\Trade;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InvestTrade extends Component
{
    public $pair;
    public $amount = 0.00;
    public $exchange = '--';
    public $equavalent = '--';
    public $expected = "0.00";
    public $currency;
    public $user;
    public $rate;

    public function mount()
    {
        $this->user = Auth::user();
        $path = "https://api.coindesk.com/v1/bpi/currentprice/KES.json";
        $this->json_data = json_decode(file_get_contents($path), true);
        $this->rate = $this->json_data['bpi']['KES']['rate'];
    }
    public function updatedPair()
    {
        $data = $this->validate([
            'pair' => 'required',
        ]);
        if ($this->pair != null) {
            $info = Pair::find($this->pair);
            $info->update([
                'exchange_rate' => (float)str_replace(',', '', $this->rate)
            ]);
            $this->exchange = '1 ' . $info->pair_a;
            $this->equavalent = $info->pair_b . " " . $this->rate;
            if ($this->amount != null) {
                $this->expected = (float)$this->amount / (float)str_replace(',', '', $this->rate);
                $this->currency = '(' .  $info->pair_a . ')';
            }
        }
    }
    public function updatedAmount()
    {
        $this->validate([
            'amount' => 'integer|between:1000,10000',           
            'pair' => 'required',
        ]);
        $info = Pair::find($this->pair);
        $this->expected = (float)$this->amount / (float)str_replace(',', '', $this->rate);
        $this->currency = '(' .  $info->pair_a . ')';
    }

    public function buyCoin()
    {
        $this->validate([
            'amount' => 'integer|between:1000,30000',
            'pair' => 'required',
        ]);
        if ($this->user->status != 0) {
            if ($this->user->balance >= $this->amount) {
                $newBalance = $this->user->balance - $this->amount;
                $info = Pair::find($this->pair);
                if ($info != null) {
                    Trade::create([
                        'user_id' => $this->user->id,
                        'pair_id' => $info->id,
                        'amount' => $this->amount,
                        'buy_price' => $info->exchange_rate,
                        'reference' => setSessionId(),
                        'status' => '0'
                    ]);
                    $this->user->update([
                        'balance' =>  $newBalance
                    ]);
                    $admiMessage = "New Crypto BUY request from :" . $this->user->username . " of Ksh " . number_format($this->amount, 2) . ".";                   
                    sendSMS('+254714871633', $admiMessage);
                    $message =  ['type' => 'success',  'message' => "BUY Request Initiated! Kindly await approval"];
                    session(['notify' => $message]);
                    return redirect()->route('user.trade.pending-orders');
                } else {
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => 'Invalid Currency Pair!']
                    );
                    return;
                }
            } else {
                if ($this->user->trade_balance > 0) {
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => "Insufficient Balance! Kindly Withdraw your Trade Balance"]
                    );
                    return;
                } else {
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => "Insufficient User Balance! Kindly Top Up!"]
                    );
                    return;
                }
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "You Have Been Banned from the System!"]
            );
            return;
        }
    }
    public function render()
    {
        return view('livewire.user.trade.invest-trade', [
            'pairs' => Pair::get()
        ]);
    }
}
