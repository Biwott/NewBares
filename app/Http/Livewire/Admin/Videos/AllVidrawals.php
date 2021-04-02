<?php

namespace App\Http\Livewire\Admin\Videos;

use App\Models\User;
use App\Models\Vidrawal;
use Livewire\Component;
use Livewire\WithPagination;

class AllVidrawals extends Component
{


    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Video Withdrawals.';
    public $page_title = "List of All Video Withdrawals";
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.videos.all', [
            'vidrawals' =>

            User::where('username', $this->search)->exists()
                ?  Vidrawal::where('user_id', User::where('username', $this->search)->first()->id)->orderBy('created_at', 'DESC')->paginate(10)
                : ($this->search != ''
                    ? Vidrawal::where('id', 0)->paginate(10)
                    : Vidrawal::orderBy('created_at', 'DESC')->paginate(10))
        ])->layout('layouts.admin');
    }
}
