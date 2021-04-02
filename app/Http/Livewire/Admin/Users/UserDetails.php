<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Currency;
use App\Models\Deposit;
use App\Models\Level;
use App\Models\Referal;
use App\Models\Spinning;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserDetails extends Component
{
    //Form Params
    public $first_name;
    public $last_name;
    public $country;
    public $subtract;
    public $add;
    public $refer;
    public $referer;
    public $sms;
    public $password;
    public $confirmation;
    public $adminActive;

    //Models
    public $user;
    public $referals;
    public $deposits;
    public $withdrawals;
    public $spinnings;
    public $blogpays;
    public $vidrawals;
    public $tradedrawals;
    public $vidsubs;
    public $trades;
    public $watches;



    public function mount(User $user)
    {
        $this->adminActive = auth()->user()->active;
        $this->user = $user;
        $this->referer = User::find($user->referer_id);
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->country = Currency::find($user->currency_id)->country;
        //Models
        $this->spinnings = $user->spinnings()->get();
        $this->deposits = $user->deposits()->get();
        $this->withdrawals = $user->withdrawals()->get();
        $this->referals = $user->referals()->get();
        $this->blogpays = $user->blogpays()->get();
        $this->vidrawals = $user->vidrawals()->get();
        $this->tradedrawals = $user->tradedrawals()->get();
        $this->vidsubs = $user->vidsubs()->get();
        $this->trades = $user->trades()->get();
        $this->watches = $user->watches()->get();
    }

    public function updateUser()
    {
        $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);
        //$user = User::findOrFail(Auth::id());
        $this->user->update([
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => "User Details Updated Successfuly!"]
        );
        return;
    }


    private function resetInputFields()
    {
        $this->add = '';
        $this->subtract = '';
        $this->refer = '';
        $this->sms = '';
        $this->password = '';
        $this->confirmation = '';
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function subBal()
    {
        $validated =   $this->validate([
            'subtract' => 'required|numeric',
        ]);
        if ($validated['subtract'] > 0) {
            if ($validated['subtract'] > $this->user->balance) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => $this->user->username . ' has insufficient Balance!']
                );
                $this->resetInputFields();
                return;
            } else {
                $balance = $this->user->balance - $validated['subtract'];
                $this->user->update(
                    ['balance' => $balance]
                );
                Deposit::create([
                    'user_id' => $this->user->id,
                    'method_id' => 2,
                    'reference' => setSessionId(),
                    'details' => 'SUB',
                    'amount' => -$validated['subtract'],
                    'status' => 1
                ]);
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => convertCurrency($this->user, $validated['subtract']) . ' has been deducted from ' .
                        $this->user->username . '\'s balance']
                );
                $this->resetInputFields();
                return;
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Invalid amount Entered!']
            );
            $this->resetInputFields();
            return;
        }

        $this->resetInputFields();
        $this->emit('hideModals');
    }


    public function addBal()
    {
        $data = $this->validate([
            'add' => 'required|numeric|min:1',

        ]);
        $balance = $this->user->balance + $data['add'];
        $this->user->update(
            ['balance' => $balance]
        );
        Deposit::create([
            'user_id' => $this->user->id,
            'method_id' => 2,
            'reference' => setSessionId(),
            'details' => 'ADD',
            'amount' => $data['add'],
            'status' => 1
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => convertCurrency($this->user, $data['add']) . ' has been added to ' .
                $this->user->username . '\'s balance']
        );
        return;
        $this->resetInputFields();
        $this->emit('hideModals');
    }

    public function sendUserSms()
    {
        $data = $this->validate([
            'sms' => 'required|max:160',
        ]);
        if (Currency::find($this->user->currency_id)->name == 'Kenya') {
            sendSMS($this->user->phone, $data['sms']);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => "Message Sent Successfully!"]
            );
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "User Country not Supported!"]
            );
        }
        $this->resetInputFields();
        $this->emit('hideModals');
    }
    public function banUser()
    {
        if ($this->user->status == 0) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Failed!, ' . $this->user->username . ' is already Banned!']
            );
            $this->resetInputFields();
            $this->emit('hideModals');
            return;
        } else {
            $this->user->status = 0;
            $this->user->save();
            $current = auth()->user();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Success, ' . $this->user->username . ' has been Banned!']
            );
            $this->resetInputFields();
            $this->emit('hideModals');
            return;
        }
    }


    public function unBanUser()
    {
        if ($this->user->status > 0) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Error!, ' . $this->user->username . ' user is not Banned!']
            );
            $this->resetInputFields();
            $this->emit('hideModals');
            return;
        } else {
            $this->user->status = 1;
            $this->user->save();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Success, ' . $this->user->username . ' has been Activated!']
            );
            $this->resetInputFields();
            $this->emit('hideModals');
            return;
        }
    }
    public function activateUser()
    {
        if ($this->user->active == 0) {
            $level = Level::find(1);
            if ($this->user->balance >= $level->price) {
                payReferals($this->user);
                $this->user->update([
                    'balance' => $this->user->balance - $level->price,
                    'active' => 1
                ]);
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => 'Success, ' . $this->user->username . ' has been activated!']
                );
                $this->resetInputFields();
                $this->emit('hideModals');
                return;
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Sorry, ' . $this->user->username . ' has insufficient balance!']
                );
                $this->resetInputFields();
                $this->emit('hideModals');
                return;
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Sorry, ' . $this->user->username . ' is already activated!']
            );
            $this->resetInputFields();
            $this->emit('hideModals');
            return;
        }

        return redirect()->route('admin.dashboard');
    }

    public function addUserReferer()
    {
        $data = $this->validate([
            'refer' => 'required',
        ]);
        $referer = User::where('username', $data['refer'])->first();
        if ($referer != null) {
            if ($this->user->referer_id > 0) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Sorry, this user already has a Referer!']
                );
                $this->resetInputFields();
                return;
            } elseif ($this->user->active == 0) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Sorry, this user is inactive!']
                );
                $this->resetInputFields();
                return;
            } elseif ($this->user->username == $data['refer']) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Sorry, this user cannot be refered by self!']
                );
                $this->resetInputFields();
                return;
            } else {
                if ($referer->active > 0) {
                    $this->user->update(['referer_id' => $referer->id]);
                    payReferals($this->user);
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'success',  'message' => 'Success! ' . $this->user->username . ' has been added to '  .  $data['refer'] . ' as Referal']
                    );
                    $this->resetInputFields();
                    return;
                } else {
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => 'Sorry, ' . $data['refer'] . ' is not Activated!']
                    );
                    $this->resetInputFields();
                    return;
                }
            }
        } else {

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Sorry, ' . $data['refer'] . ' does not exist!']
            );
            return;
        }
    }

    public function resetPassword()
    {
        $data = $this->validate([
            'password' => 'required|same:confirmation|min:6|max:191',
        ]);
        $this->user->password = Hash::make($data['password']);
        $this->user->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => "Password Updated Successfuly!"]
        );
        $this->resetInputFields();
        $this->emit('hideModals');
        return;
    }

    public function reverseSubscription()
    {
        if ($this->user->active > 0) {
            if ($this->user->status > 0) {
                reverseReferals($this->user);
                $deposits = Deposit::where('user_id', $this->user->id)->where('status', 1)->get();
                $this->user->update([
                    'status' => 0,
                    'inactive' => 1,
                    'active' => 0
                ]);
                foreach ($deposits as $deposit) {
                    $deposit->update([
                        'status' => 2
                    ]);
                }
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => "User Reversed Successfuly!"]
                );
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => "Error! User is Banned!"]
                );
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Error! User is Inactive!"]
            );
        }
    }

    public function render()
    {
        return view('livewire.admin.users.detail',  [
            'currencies' => Currency::get(),
        ])->layout('layouts.admin');
    }
}
