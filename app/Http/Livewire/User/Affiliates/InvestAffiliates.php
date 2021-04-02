<?php

namespace App\Http\Livewire\User\Affiliates;

use App\Models\Referal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class InvestAffiliates extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Investment Affiliate History.';
    public $page_title = 'Investment Affiliate History';



    public function getHistory()
    {
        $empty_message = 'No Referral History';;
        return view('user.affiliate.history', compact('empty_message', 'referals'));
    }

    public function render()
    {
        return view(
            'livewire.user.affiliates.invest-affiliates',
            ['referals' => Referal::where('user_id', Auth::id())->where('type', 'invest')->latest()->paginate(15)]
        );
    }
}
