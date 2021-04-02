<?php

namespace App\Http\Livewire\Admin\Affiliates;

use App\Models\Referal;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserAffiliateHistory extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Referal History.';
    public $page_title = "Referal History";
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
            'livewire.admin.affiliates.history',
            ['referals' => Referal::where('user_id', $this->user->id)->latest()->paginate(15),]
        )->layout('layouts.admin');
    }
}
