<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Login as LoginHistory;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserLoginHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Login History.';
    public $page_title = 'Login History';
    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
    }


    public function render()
    {
        return view('livewire.admin.users.user-login-history', [
            'logins' => LoginHistory::where('user_id', $this->user->id)->latest()->paginate(20)
        ])->layout('layouts.admin');
    }
}
