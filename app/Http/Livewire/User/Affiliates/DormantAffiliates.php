<?php

namespace App\Http\Livewire\User\Affiliates;

use App\Models\Referal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DormantAffiliates extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Dormant Referals.';
    public $page_title = 'My Dormant Referals';

    public function render()
    {
        return view(
            'livewire.user.affiliates.dormant-affiliates',
            ['referals' => User::where('referer_id', Auth::id())->where('active', 0)->latest()->paginate(15)]
        );
    }
}
