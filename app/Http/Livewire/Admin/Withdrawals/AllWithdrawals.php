<?php

namespace App\Http\Livewire\Admin\Withdrawals;

use App\Models\User;
use App\Models\Withdrawal;
use Livewire\Component;
use Livewire\WithPagination;

class AllWithdrawals extends Component
{


    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Withdrawals.';
    public $page_title = "List of All Withdrawals";
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
                ?  Withdrawal::where('user_id', User::where('username', $this->search)->first()->id)->orderBy('created_at', 'DESC')->paginate(10)
                : ($this->search != ''
                    ? Withdrawal::where('id', 0)->paginate(10)
                    : Withdrawal::orderBy('created_at', 'DESC')->paginate(15))
        ])->layout('layouts.admin');



        return view('livewire.admin.users.all', [
            'users' => User::where('username', 'like', '%' . $this->username . '%')
                ->Where('phone', 'like', '%' . $this->phone . '%')->latest()->paginate(10),
        ])->layout('layouts.admin');
    }
}
