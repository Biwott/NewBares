<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout2 extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect(route('user.login'));
    }
    public function render()
    {
        return view('livewire.auth.logout2');
    }
}
