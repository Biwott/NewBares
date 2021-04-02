<?php

namespace App\Http\Livewire\Admin\Withdrawals;

use App\Mail\InvoiceApproved;
use App\Mail\InvoiceRejected;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\NotifyInvoiceApproved;
use App\Notifications\NotifyInvoiceDeclined;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class PendingWithdrawals extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $empty_message = 'No Available Withdrawals.';
    public $page_title = "List of Pending Withdrawals";
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function loadNotify()
    {
        $value = session('notifyAdmin');
        if ($value != null) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => $value['type'],  'message' => $value['message']]
            );
            Session::forget('notifyAdmin');
        }
    }
    public function approve(Withdrawal $withdrawal)
    {
        $user = User::find($withdrawal->user_id);
        $withdrawal->update(['status' => 1]);
        $user->update([
            'status' => 1
        ]);
        $user->notify(new NotifyInvoiceApproved($withdrawal));
        $message = "Congratulations! You have received Ksh" . number_format($withdrawal->final_amount, 2) . " into your MPESA account from EARNEST VENTURES http://earnest.co.ke .";
        sendSMS($user->phone, $message);
        Mail::to($user->email)->send(new InvoiceApproved($withdrawal));
        return redirect()->route('admin.withdrawals.pending');
    }

    public function decline(Withdrawal $withdrawal)
    {
        $user = User::find($withdrawal->user_id);;
        $user->update([
            'balance' => $user->balance + $withdrawal->amount,
            'status' => 1
        ]);
        $withdrawal->update(['status' => 2]);
        $user->notify(new NotifyInvoiceDeclined($withdrawal));
        Mail::to($user->email)->send(new InvoiceRejected($withdrawal));
        return redirect()->route('admin.withdrawals.pending');
    }

    public function render()
    {
        return view('livewire.admin.withdrawals.all', [
            'withdrawals' =>
            User::where('username', $this->search)->exists()
                ?  Withdrawal::where('status', 0)->where('user_id', User::where('username', $this->search)->first()->id)->orderBy('created_at', 'DESC')->paginate(10)
                : ($this->search != ''
                    ? Withdrawal::where('id', 0)->paginate(10)
                    : Withdrawal::where('status', 0)->orderBy('created_at', 'DESC')->paginate(15))
        ])->layout('layouts.admin');
    }
}
