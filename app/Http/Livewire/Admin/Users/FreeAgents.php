<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FreeAgents extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $page_title = 'List of Free Agent Users';
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
            'users' => User::where('referer_id', 0)->where('username', 'like', '%' . $this->search . '%')
                ->Where('phone', 'like', '%' . $this->search . '%')->latest()->paginate(10),
        ])->layout('layouts.admin');
    }
}
