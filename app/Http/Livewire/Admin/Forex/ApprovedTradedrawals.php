<?php

namespace App\Http\Livewire\Admin\Forex;

use App\Models\Tradedrawal;
use Livewire\Component;
use App\Models\User;
use App\Notifications\NotifyTradedrawalApproved;
use App\Notifications\NotifyTradedrawalDeclined;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class ApprovedTradedrawals extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Forex Withdrawals.';
    public $page_title = "List of Pending Forex Withdrawals";
    public $search = '';

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

    public function approve(Tradedrawal $tradedrawal)
    {
        $user = User::find($tradedrawal->user_id);
        $tradedrawal->update(['status' => 1]);
        $user->update([
            'balance' => $user->balance + $tradedrawal->amount,
            'trade_lock' => 0
        ]);
        $user->notify(new NotifyTradedrawalApproved($tradedrawal));
        return redirect()->route('admin.forex.pending-withdrawals');
    }

    public function decline(Tradedrawal $tradedrawal)
    {
        $user = User::find($tradedrawal->user_id);;
        $user->update([
            'trade_balance' => $user->trade_balance + $tradedrawal->amount,
            'trade_lock' => 0
        ]);
        $tradedrawal->update(['status' => 2]);
        $user->notify(new NotifyTradedrawalDeclined($tradedrawal));
        return redirect()->route('admin.forex.pending-withdrawals');
    }

    public function render()
    {
        return view('livewire.admin.forex.tradedrawals', [
            'tradedrawals' =>
            User::where('username', $this->search)->exists()
                ?  Tradedrawal::where('status', 1)->where('user_id', User::where('username', $this->search)->first()->id)->orderBy('created_at', 'DESC')->paginate(10)
                : ($this->search != ''
                    ? Tradedrawal::where('id', 0)->paginate(10)
                    : Tradedrawal::where('status', 1)->orderBy('created_at', 'DESC')->paginate(10))
        ])->layout('layouts.admin');
    }
}
