<?php

namespace App\Http\Livewire\User\Trade;

use Livewire\Component;

use App\Models\Trade;
use Illuminate\Support\Facades\Auth;


use Livewire\WithPagination;

class TradeHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Trading History.';
    public $page_title = "Forex Trading History";
    public $user;


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
            'livewire.user.trade.trade-history',
            ['orders' => Trade::where('user_id', Auth::user()->id)->where('status', 1)->orWhere('status', 3)->latest()->paginate(15)]
        );
    }
}
