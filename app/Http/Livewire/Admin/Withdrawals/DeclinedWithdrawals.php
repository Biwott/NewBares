<?php

namespace App\Http\Livewire\Admin\Withdrawals;

use App\Models\User;
use App\Models\Withdrawal;
use Livewire\Component;
use Livewire\WithPagination;

class DeclinedWithdrawals extends Component
{
   
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Withdrawals.';
    public $page_title = "List of Declined Withdrawals";
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.withdrawals.all', [
            'withdrawals' =>

            User::where('username', $this->search)->exists()
                ?  Withdrawal::where('status', 2)->where('user_id', User::where('username', $this->search)->first()->id)->orderBy('created_at', 'DESC')->paginate(10)
                : ($this->search != ''
                    ? Withdrawal::where('id', 0)->paginate(10)
                    : Withdrawal::where('status', 2)->orderBy('created_at', 'DESC')->paginate(15))
        ])->layout('layouts.admin');
    }
}
