<?php

namespace App\Http\Livewire\Admin\Withdrawals;

use App\Models\User;
use App\Models\Withdrawal;
use Livewire\Component;
use Livewire\WithPagination;

class UserWithdrawalHistory extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Withdrawal History.';
    public $page_title = 'Withdrawal History';
    public $user;
    public $username;

    public function mount( $id)
    {
        $this->user = User::find($id);
        $this->username=$this->user->username;
    }

    public function render()
    {
        return view('livewire.admin.withdrawals.user-withdrawal-history', [
            'withdrawals' => Withdrawal::where('user_id', $this->user->id)->where('status', 1)->latest()->paginate(15),
        ])->layout('layouts.admin');
    }
}
