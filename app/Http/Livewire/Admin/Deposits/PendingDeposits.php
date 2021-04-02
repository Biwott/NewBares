<?php

namespace App\Http\Livewire\Admin\Deposits;

use App\Models\Deposit;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PendingDeposits extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Deposits.';
    public $page_title = "List of All Deposits";
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.deposits.all', [
            'deposits' =>

            User::where('username', $this->search)->exists()
                ?  Deposit::where('status', 0)->where('user_id', User::where('username', $this->search)->first()->id)->orderBy('created_at', 'DESC')->paginate(10)
                : ($this->search != ''
                    ? Deposit::where('id', 0)->paginate(10)
                    : Deposit::where('status', 0)->orderBy('created_at', 'DESC')->paginate(10))
        ])->layout('layouts.admin');
    }
}
