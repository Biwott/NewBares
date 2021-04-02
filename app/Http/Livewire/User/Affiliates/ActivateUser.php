<?php

namespace App\Http\Livewire\User\Affiliates;

use App\Models\Level;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ActivateUser extends Component
{
    public $user;
    public $username;
    public $inActive;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function activate()
    {
        $data = $this->validate([
            'username' => 'required',
        ]);
        $this->inActive = User::where('username', $data['username'])->first();
        if ($this->inActive != null) {
            if ($this->inActive->active == 0) {
                $level = Level::find(1);
                if ($this->user->balance >= $level->price) {
                    $this->user->update([
                        'balance' => $this->user->balance - $level->price,
                    ]);
                    $this->inActive->update([
                        'referer_id' => $this->user->id,
                        'active' => 1
                    ]);
                    payReferals($this->inActive);
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'success',  'message' => 'Success, ' . $this->inActive->username . ' has been activated!']
                    );
                    return;
                } else {
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => 'Sorry ' . $this->user->username . ', you have insufficient balance!']
                    );
                    return;
                }
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Sorry, ' . $this->inActive->username . ' is already activated!']
                );
                return;
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Sorry, ' . $this->username . ' user does not exist!']
            );
        }
    }

    public function render()
    {
        return view('livewire.user.affiliates.activate-user');
    }
}
