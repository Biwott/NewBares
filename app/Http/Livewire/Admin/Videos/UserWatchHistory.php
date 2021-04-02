<?php

namespace App\Http\Livewire\Admin\Videos;

use App\Models\User;
use App\Models\Watch;
use Livewire\Component;
use Livewire\WithPagination;

class UserWatchHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Watch History.';
    public $page_title = 'Watch History';
    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
      
    }

    public function render()
    {
        return view(
            'livewire.admin.videos.user-vidrawal-history',
            ['watches' => Watch::where('user_id', $this->user->id)->where('status', 1)->latest()->paginate(15)]
        )->layout('layouts.admin');
    }

}
