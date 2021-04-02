<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ActiveUsers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $page_title = 'List of Active Users';
    public $empty_message = 'No Available Users.';

    public $search = '';
    public $phone_checked = '';
    public $username = '';
    public $phone = '';

    public function updatedSearch()
    {
        if ($this->phone_checked == 1) {
            $this->username = '';
            $this->phone = $this->search;
        } else {
            $this->username = $this->search;
            $this->phone = '';
        }
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.users.all', [
            'users' => User::where('active', '1')->where('username', 'like', '%' . $this->search . '%')
                ->Where('phone', 'like', '%' . $this->search . '%')->paginate(10),
        ])->layout('layouts.admin');
    }
}
