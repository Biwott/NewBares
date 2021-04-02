<?php

namespace App\Http\Livewire\Admin\Deposits;

use App\Models\Deposit;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ApprovedDeposits extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Deposits.';
    public $page_title = "List of All Deposits";
    public $search = '';
    public $code_checked;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
       
        if ($this->code_checked == 1) {
            return view('livewire.admin.deposits.all', [
                'deposits' => Deposit::where('reference', 'like', '%' . $this->search . '%')->where('status', 1)->latest()->paginate(15)
            ])->layout('layouts.admin');
        } else {
            return view('livewire.admin.deposits.all', [
                'deposits' =>
    
                User::where('username', $this->search)->exists()
                    ?  Deposit::where('status', 1)->where('user_id', User::where('username', $this->search)->first()->id)->orderBy('created_at', 'DESC')->paginate(10)
                    : ($this->search != ''
                        ? Deposit::where('id', 0)->paginate(10)
                        : Deposit::where('status', 1)->orderBy('created_at', 'DESC')->paginate(10))
            ])->layout('layouts.admin');
        }
    }
}
