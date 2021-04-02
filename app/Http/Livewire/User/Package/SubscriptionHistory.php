<?php

namespace App\Http\Livewire\User\Package;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class SubscriptionHistory extends Component
{


    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Investment History.';
    public $page_title = "Investment History";

    public function loadNotify()
    {
        $value = session('notify');
        if ($value != null) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => $value['type'],  'message' => $value['message']]
            );
            Session::forget('notify');
        }
    }



    public function render()
    {
        return view('livewire.user.package.subscription-history', [
            'subscriptions' => Subscription::where('user_id', '=', Auth::id())->latest()->paginate(15),
        ]);
    }
}
