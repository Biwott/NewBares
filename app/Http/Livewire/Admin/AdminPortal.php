<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use App\Models\Sms;
use Livewire\Component;

class AdminPortal extends Component
{
    public $access_token;

    public $super_permission = false;
    public $other_permission = false;
    public $users_permission = false;
    public $pay_permission = false;
    public $blog_permission = false;
    public $admin;
    public $count = 0;


    public function mount()
    {
        $this->admin = auth()->user();
        if ($this->admin->active == 1) {
            $this->super_permission = true;
        } elseif ($this->admin->active == 2) {
            $this->other_permission = true;
        } elseif ($this->admin->active == 3) {
            $this->users_permission = true;
        } elseif ($this->admin->active == 4) {
            $this->pay_permission = true;
        } elseif ($this->admin->active == 5) {
            $this->blog_permission = true;
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-portal')->layout('layouts.admin');
    }
    public function sendInvites()
    {
        $data = $this->validate([
            'access_token' => ['required'],
        ]);

        if ($data['access_token'] == '#$%$%45453235') {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Success!! Initailising...']
            );
            $message = "Welcome to Earnest Ventures -Earn with referal:- Ksh 300 Level 1, Level 2 Ksh 150 & Level 3 Ksh 50. Join now with Ksh550. http://earnest.co.ke/";
            $contacts = Contact::where('status', 0)->get();
            foreach ($contacts as $contact) {
                if (!Sms::where('phone', $contact->phone)->where('status', 2)->exists()) {
                    sendInviteSms($contact->phone, $message);
                    $this->count = $this->count + 1;
                    $contact->update([
                        'status' => 1
                    ]);
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'success',  'message' => 'Successfuly Sent to ' . $contact->phone]
                    );
                } else {
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => 'User Message is already Sent!']
                    );
                }
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => 'Error! Invalid Access token! Try again']
            );
        }
    }
}
