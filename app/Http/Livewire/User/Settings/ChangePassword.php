<?php

namespace App\Http\Livewire\User\Settings;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ChangePassword extends Component
{

    public $current = '';
    public $password = '';
    public $confirmation = '';

    public function updatedConfirmation()
    {
        $this->validate([
            'current' => 'required|max:191',
            'password' => 'required|same:confirmation|max:191',
        ]);
    }

    function updatePassword()
    {
        $this->validate([
            'current' => 'required|max:191',
            'password' => 'required|same:confirmation|max:191',
        ]);

        $user = User::findOrFail(Auth::id());
        if (!Hash::check($this->current, $user->password)) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Current password does not match!"]
            );
            return;
        }
        if ($this->current == $this->password) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Current Password and New Password should not be same!"]
            );
            return;
        }
        $user->password = Hash::make($this->password);
        $user->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => "Password Updated Successfuly!"]
        );
        $this->current = '';
        $this->password = '';
        $this->confirmation = '';
        return;
    }
    
    public function render()
    {
        return view('livewire.user.settings.change-password');
    }
}
