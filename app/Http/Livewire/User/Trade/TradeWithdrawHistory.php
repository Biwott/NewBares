<?php

namespace App\Http\Livewire\User\Trade;

use App\Models\Tradedrawal;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class TradeWithdrawHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No withdrawal History.';
    public $page_title = 'Forex Withdrawal History';
    public $user;
    public function mount()
    {
        $this->user = auth()->user();
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
    public function render()
    {
        return view('livewire.user.trade.trade-withdraw-history', [
            'tradedrawals' => Tradedrawal::where('user_id', $this->user->id)->latest()->paginate(15),
        ]);
    }
}
