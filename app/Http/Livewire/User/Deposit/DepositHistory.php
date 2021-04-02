<?php

namespace App\Http\Livewire\User\Deposit;

use App\Models\Deposit;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class DepositHistory extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No deposit History.';
    public $page_title = "Deposit History";
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
        return view('livewire.user.deposit.deposit-history',  [
            'deposits' => Deposit::where('user_id', $this->user->id)->where('status', 1)->latest()->paginate(15),
        ]);
    }
}
