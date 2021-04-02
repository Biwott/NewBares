<?php

namespace App\Http\Livewire\User\Trade;

use App\Models\Trade;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class ForexOption extends Component
{
    use WithPagination;


    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Active Trades Kindly Invest.';
    public $user;
    public $crypto_rate;
    public $rate;
    public $amount;
    public $sell_price;
    public $current_amount;
    public $profit_amount;
    public $percentage_margin;
    public $balance;

    public function mount()
    {
        $this->user = Auth::user();
        $this->balance = $this->user->trade_balance;
    }
    public function loadNotify()
    {
        $value = session('notify');
        if ($value != null) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => $value['type'],  'message' => $value['message']]
            );
            Session::forget('notify');
        }
    }
    public function edit(Trade $trade)
    {
        $this->sell_price = $trade->sell_price;
        $this->amount = $trade->amount_exchange;
        $this->current_amount = $trade->amount_exchange + $this->getCurrentMargin($trade);
        $this->profit_amount = $this->getCurrentMargin($trade);
        $this->percentage_margin = $this->getPercentageMargin($trade);
    }

    public function cancel()
    {
        $this->emit('forexClose');
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->sell_price = 0.00;
        $this->amount = 0.00;
    }

    public function sellOrder(Trade $trade)
    {
        $trade->update([
            'sell_price' => (float)str_replace(',', '', $this->rate),
            'gain' => $this->getCurrentMargin($trade),
            'percentage' => $this->getPercentageMargin($trade),
            'status' => 2,
        ]);
        $admiMessage = "New Crypto SELL request from :" . $this->user->username . " of Ksh " . number_format($this->getCurrentMargin($trade), 2) . ".";                   
        sendSMS('+254714871633', $admiMessage);
        $this->emit('forexClose');
        $this->resetInputFields();
        $message =  ['type' => 'success',  'message' => "Successfully Requested Trade SELL! Kindly await approval!"];
        session(['notify' => $message]);
        return redirect()->route('user.trade.forex');
    }
    public function refreshCrypto()
    {
        $path = "https://api.coindesk.com/v1/bpi/currentprice/KES.json";
        $this->json_data = json_decode(file_get_contents($path), true);
        $this->rate = $this->json_data['bpi']['KES']['rate'];
        return (float)str_replace(',', '', $this->rate);
    }

    public function getCurrentMargin(Trade $trade)
    {
        $current = ((float)$trade->amount * (float)str_replace(',', '', $this->rate)) / (float)$trade->buy_price_exchange;
        return $current - $trade->amount;
    }

    public function getPercentageMargin(Trade $trade)
    {
        return ($this->getCurrentMargin($trade) / $trade->amount) * 100;
    }
    public function render()
    {
        return view(
            'livewire.user.trade.forex-option',
            ['orders' => Trade::where('user_id', $this->user->id)->where('status', '1')->orWhere('status', '2')->latest()->paginate(3)]
        );
    }
}
