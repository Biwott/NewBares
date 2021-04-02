<?php

namespace App\Http\Livewire\Admin\Videos;

use App\Models\User;
use App\Models\Vidrawal;
use Livewire\Component;
use Livewire\WithPagination;

class PendingVidrawals extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Video Withdrawals.';
    public $page_title = "List of Pending Video Withdrawals";
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function approve(Vidrawal $vidrawal)
    {
        $user = User::find($vidrawal->user_id);
        $vidrawal->update(['status' => 1]);
        $user->update([
            'balance' => $user->balance + $vidrawal->amount,
            'status' => 1
        ]);
        //  $user->notify(new NotifyInvoiceApproved($withdrawal));
        return redirect()->route('admin.videos.pending');
    }

    public function decline(Vidrawal $vidrawal)
    {
        $user = User::find($vidrawal->user_id);;
        $user->update([
            'vid_balance' => $user->vid_balance + $vidrawal->amount,
            'status' => 1
        ]);
        $vidrawal->update(['status' => 2]);
        //$user->notify(new NotifyInvoiceDeclined($withdrawal));
        return redirect()->route('admin.videos.pending');
    }

    public function render()
    {
        return view('livewire.admin.videos.all', [
            'vidrawals' =>

            User::where('username', $this->search)->exists()
                ?  Vidrawal::where('status', 0)->where('user_id', User::where('username', $this->search)->first()->id)->orderBy('created_at', 'DESC')->paginate(10)
                : ($this->search != ''
                    ? Vidrawal::where('id', 0)->paginate(10)
                    : Vidrawal::where('status', 0)->orderBy('created_at', 'DESC')->paginate(10))
        ])->layout('layouts.admin');
    }
}
