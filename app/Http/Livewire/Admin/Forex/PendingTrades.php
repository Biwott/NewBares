<?php

namespace App\Http\Livewire\Admin\Forex;

use App\Models\Trade;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;


class PendingTrades extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Pending Trades Available.';
    public $page_title = "List of Pending Trades";
    public $search = '';
    //Buy Order
    public $buyAmount; // model amount
    public $buyCommision; //(amount *10)/100
    public $newBuyPrice; // model buy_price /new_price
    public $newBuyPriceWithComm; // incremen newBuyPrice by commsion
    public $newBuyAmount;
    public $buyTrade; //Model

    //Sell Order
    public $sellAmount;
    public $sellCommision;
    public $newSellPrice;
    public $newSellPriceWithComm;
    public $newSellAmount;
    public $sellTrade;
    public $sellGain;


    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function loadNotify()
    {
        $value = session('notifyAdmin');
        if ($value != null) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => $value['type'],  'message' => $value['message']]
            );
            Session::forget('notifyAdmin');
        }
    }

    public function editBuy(Trade $buyTrade)
    {
        $this->buyTrade = $buyTrade;
        $this->buyAmount = $buyTrade->amount;
        $this->buyCommision = $this->buyTrade->amount * 0.05;
        $this->newBuyPrice = $this->buyTrade->buy_price;
        $this->newBuyPriceWithComm = 1 / ((($this->buyTrade->amount - $this->buyCommision) * (1 / $this->newBuyPrice)) / $buyTrade->amount);
        $this->newBuyAmount = (($buyTrade->amount / $this->newBuyPriceWithComm) * $this->buyTrade->buy_price);
    }

    public function editSell(Trade $sellTrade)
    {
        $this->sellTrade = $sellTrade;
        $this->sellAmount = $sellTrade->amount;
        $this->sellCommision = 0;
        $this->newSellPrice =  $this->sellTrade->sell_price;
        $this->newSellPriceWithComm = (($this->sellTrade->amount_exchange - $this->sellCommision) * $this->newSellPrice) / $sellTrade->amount_exchange;
        $this->newSellAmount = (($this->newSellPriceWithComm / $sellTrade->buy_price_exchange) *  $sellTrade->amount);
        $this->sellGain = $this->newSellAmount - $sellTrade->amount;
    }

    public function resetBuyInputFields()
    {
        $this->buyTrade = '';
        $this->buyAmount = '';
        $this->buyCommision =  '';
        $this->newBuyPrice =  '';
        $this->newBuyPriceWithComm =  '';
        $this->newBuyAmount =  '';
    }


    public function resetSellInputFields()
    {
        $this->sellTrade = '';
        $this->sellAmount = '';
        $this->sellCommision = '';
        $this->newSellPrice =  '';
        $this->newSellPriceWithComm = '';
        $this->newSellAmount = '';
        $this->sellGain = '';
    }

    public function cancelBuy()
    {
        $this->resetBuyInputFields();
    }

    public function cancelSell()
    {
        $this->resetSellInputFields();
    }

    public function updatedBuyCommision()
    {
        $this->validate([
            'buyCommision' => 'required|numeric',
        ]);
        $this->newBuyPriceWithComm = 1 / ((($this->buyTrade->amount - $this->buyCommision) * (1 / $this->newBuyPrice)) / $this->buyTrade->amount);
        $this->newBuyAmount = (($this->buyTrade->amount / $this->newBuyPriceWithComm) * $this->buyTrade->buy_price);
    }

    public function updatedSellCommision()
    {
        $this->validate([
            'sellCommision' => 'required|numeric',
        ]);
        $this->newSellPriceWithComm = (($this->sellTrade->amount_exchange - $this->sellCommision) * $this->newSellPrice) / $this->sellTrade->amount_exchange;
        $this->newSellAmount = (($this->newSellPriceWithComm / $this->sellTrade->buy_price_exchange) *  $this->sellTrade->amount);
        $this->sellGain = $this->newSellAmount - $this->sellTrade->amount;
    }
    public function updatedNewBuyPrice()
    {
        $this->validate([
            'buyCommision' => 'required|numeric',
            'newBuyPrice' => 'required|numeric',
        ]);
        $this->newBuyPriceWithComm = 1 / ((($this->buyTrade->amount - $this->buyCommision) * (1 / $this->newBuyPrice)) / $this->buyTrade->amount);
        $this->newBuyAmount = (($this->buyTrade->amount / $this->newBuyPriceWithComm) * $this->buyTrade->buy_price);
    }
    public function updatedNewSellPrice()
    {
        $this->validate([
            'sellCommision' => 'required|numeric',
            'newSellPrice' => 'required|numeric',
        ]);
        $this->newSellPriceWithComm = (($this->sellTrade->amount_exchange - $this->sellCommision) * $this->newSellPrice) / $this->sellTrade->amount_exchange;
        $this->newSellAmount = (($this->newSellPriceWithComm / $this->sellTrade->buy_price_exchange) *  $this->sellTrade->amount);
        $this->sellGain = $this->newSellAmount - $this->sellTrade->amount;
    }

    public function approveBuy(Trade $buyTrade)
    {
        $this->validate([
            'buyCommision' => 'required|numeric',
            'newBuyPrice' => 'required|numeric|between:5000000,7000000',
        ]);
        $this->newBuyPriceWithComm = 1 / ((($this->buyTrade->amount - $this->buyCommision) * (1 / $this->newBuyPrice)) / $buyTrade->amount);
        $this->newBuyAmount = (($buyTrade->amount / $this->newBuyPriceWithComm) * $this->buyTrade->buy_price);
        $buyTrade->update([
            'opened_at' => Carbon::now()->toDateTimeString(),
            'buy_price_exchange' => $this->newBuyPriceWithComm,
            'status' => 1,
            'amount_exchange' => $this->newBuyAmount
        ]);
        // $user->notify(new NotifyTradeOpened($withdrawal));       
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => "Successfuly Activated Forex Trade!"]
        );
        $this->emit('forexClose');
        $this->resetBuyInputFields();
    }
    public function approveSell(Trade $sellTrade)
    {
        $this->validate([
            'sellCommision' => 'required|numeric',
            'newSellPrice' => 'required|numeric',
        ]);
        $this->newSellPriceWithComm = (($this->sellTrade->amount_exchange - $this->sellCommision) * $this->newSellPrice) / $this->sellTrade->amount_exchange;
        $this->newSellAmount = (($this->newSellPriceWithComm / $this->sellTrade->buy_price_exchange) *  $this->sellTrade->amount);
        $this->sellGain = $this->newSellAmount - $this->sellTrade->amount;
        $user = User::find($sellTrade->user_id);
        $sellTrade->update([
            'closed_at' => Carbon::now()->toDateTimeString(),
            'sell_price_exchange' => $this->newSellPriceWithComm,
            'gain_exchange' => $this->sellGain,
            'amount_sell' => $this->newSellAmount,
            'buy_commision' => $this->sellCommision,
            'percentage_exchange' => (($this->sellGain * 100) / $this->sellTrade->amount_exchange),
            'status' => 3,
        ]);
        $user->update([
            'trade_balance' => $user->trade_balance +  $this->newSellAmount,
        ]);
        // $user->notify(new NotifyInvoiceApproved($withdrawal));
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => "Successfuly Sold a Forex Trade!"]
        );
        $this->emit('forexClose');
        $this->resetSellInputFields();
    }


    public function declineBuy(Trade $buyTrade)
    {
        $user = User::find($buyTrade->user_id);;
        $user->update([
            'balance' => $user->balance + $buyTrade->amount,
        ]);
        $buyTrade->update(['status' => 4]);
        //$user->notify(new NotifyInvoiceDeclined($withdrawal));
        //Mail::to($user->email)->send(new InvoiceRejected($withdrawal));
        return redirect()->route('admin.withdrawals.pending');
    }

    public function declineSell(Trade $sellTrade)
    {
        $user = User::find($sellTrade->user_id);;
        $sellTrade->update([
            'status' => 1
        ]);
        //$user->notify(new NotifyInvoiceDeclined($withdrawal));
        return redirect()->route('admin.withdrawals.pending');
    }

    public function render()
    {
        return view('livewire.admin.forex.pending-trades', [
            'orders' =>
            User::where('username', $this->search)->exists()
                ?  Trade::where('status', 0)->Trade::orWhere('status', 2)->where('user_id', User::where('username', $this->search)->first()->id)->orderBy('created_at', 'DESC')->paginate(10)
                : ($this->search != ''
                    ? Trade::where('id', 0)->paginate(10)
                    : Trade::where('status', 0)->orWhere('status', 2)->orderBy('created_at', 'DESC')->paginate(10))
        ])->layout('layouts.admin');;
    }
}
