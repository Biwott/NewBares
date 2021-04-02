<?php

namespace App\Http\Livewire\User\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AlterProfile extends Component
{
    public $first_name;
    public $last_name;

    public function mount()
    {
        $user = User::findOrFail(Auth::id());
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
    }
    public function updateUser()
    {
        $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
        ]);
        $user = User::findOrFail(Auth::id());
        $user->update([
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => "User Details Updated Successfuly!"]
        );
        return;
    }
    public function render()
    {
        return view('livewire.user.settings.alter-profile');
    }
}
