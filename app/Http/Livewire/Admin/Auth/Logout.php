<?php

namespace App\Http\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/loginx33');
    }
    public function render()
    {
        return view('livewire.admin.auth.logout');
    }
}
