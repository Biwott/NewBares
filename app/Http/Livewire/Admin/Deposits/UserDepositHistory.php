<?php

namespace App\Http\Livewire\Admin\Deposits;

use App\Models\Deposit;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserDepositHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No deposit History.';
    public $page_title = "Deposit History";
    public $user;
    public $username;
    public function mount($id)
    {
        $this->user = User::find($id);
        $this->username = $this->user->username;
    }
    public function render()
    {
        return view('livewire.admin.deposits.history',  [
            'deposits' => Deposit::where('user_id', $this->user->id)->where('status', 1)->latest()->paginate(15),
        ])->layout('layouts.admin');
    }
}
