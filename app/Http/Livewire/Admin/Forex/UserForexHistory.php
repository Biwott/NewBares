<?php

namespace App\Http\Livewire\Admin\Forex;

use App\Models\Trade;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserForexHistory extends Component
{


    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Forex History.';
    public $page_title = 'Forex History';
    public $user;
  

    public function mount($id)
    {
        $this->user = User::find($id);
    }


    public function render()
    {
        return view(
            'livewire.admin.forex.user-forex-history',
            ['orders' => Trade::where('user_id', $this->user->id)->where('status', 1)->orWhere('status', 3)->latest()->paginate(15)]
        );
    }
}
