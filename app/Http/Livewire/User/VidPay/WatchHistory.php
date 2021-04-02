<?php

namespace App\Http\Livewire\User\VidPay;

use Livewire\Component;
use App\Models\Watch;

use Livewire\WithPagination;


class WatchHistory extends Component
{


    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Watch History.';
    public $page_title = "Video Watch History";
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.user.vid-pay.watch-history', [
            'watches' => Watch::where('user_id', $this->user->id)->latest()->paginate(20),
        ]);
    }
}
