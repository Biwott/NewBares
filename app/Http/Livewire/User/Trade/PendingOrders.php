<?php

namespace App\Http\Livewire\User\Trade;

use App\Models\Trade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class PendingOrders extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Pending Orders.';
    public $page_title = "Pending Trades";
    public $user;
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
        return view(
            'livewire.user.trade.pending-orders',
            ['orders' => Trade::where('user_id', Auth::user()->id)->where('status', 0)->orWhere('status' , 2)->latest()->paginate(15)]
        );
    }
}
