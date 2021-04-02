<?php

namespace App\Http\Livewire\User\Affiliates;

use App\Models\Referal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class JoinAffiliates extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $empty_message = 'No Join Affiliate History.';
    public $page_title = 'Join Affiliate History';

    public function render()
    {
        return view(
            'livewire.user.affiliates.join-affiliates',
            ['referals' => Referal::where('user_id', Auth::id())->where('type', 'join')->latest()->paginate(15)]
        );
    }
}
