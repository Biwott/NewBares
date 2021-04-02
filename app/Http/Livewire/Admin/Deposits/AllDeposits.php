<?php

namespace App\Http\Livewire\Admin\Deposits;

use App\Models\Deposit;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AllDeposits extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Deposits.';
    public $page_title = "List of All Deposits";
    public $search = '';
    public $username = '';
    public $code_checked;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        if ($this->code_checked == 1) {
            return view('livewire.admin.deposits.all', [
                'deposits' => Deposit::where('reference', 'like', '%' . $this->search . '%')->latest()->paginate(15)
            ])->layout('layouts.admin');
        } else {
            return view('livewire.admin.deposits.all', [
                'deposits' =>
                User::where('username', $this->search)->exists()
                    ?  Deposit::where('user_id', User::where('username', $this->search)->first()->id)->latest()->paginate(15)
                    : ($this->search != ''
                        ? Deposit::where('id', -1)->paginate(0)
                        : Deposit::orderBy('created_at', 'DESC')->paginate(15))
            ])->layout('layouts.admin');
        }
    }
}
