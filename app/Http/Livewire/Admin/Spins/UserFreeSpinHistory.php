<?php

namespace App\Http\Livewire\Admin\Spins;

use App\Models\Spinning;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserFreeSpinHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Watch History.';
    public $page_title = 'Watch History';
    public $user;
    public $username;

    public function mount($id)
    {
        $this->user = User::find($id);
        $this->username = $this->user->username;
    }

    public function render()
    {
        return view(
            'livewire.admin.spins.user-free-spin-history',
            ['spinnings' => Spinning::where('user_id', $this->user->id)->where('status', 1)->latest()->paginate(15)]
        )->layout('layouts.admin');
    }
}
