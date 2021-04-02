<?php

namespace App\Http\Livewire\Admin\Videos;

use App\Models\User;
use App\Models\Vidrawal;
use Livewire\Component;
use Livewire\WithPagination;

class UserVidrawalHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Video Withdrawal History.';
    public $page_title = 'Video Withdrawal History';
    public $user;
    public $username;

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function render()
    {

        return view('livewire.admin.videos.user-vidrawal-history', [
            'vidrawals' => Vidrawal::where('user_id', $this->user->id)->latest()->paginate(15),
        ]);
    }
}
