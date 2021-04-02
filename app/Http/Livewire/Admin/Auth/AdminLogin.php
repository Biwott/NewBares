<?php

namespace App\Http\Livewire\Admin\Auth;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

class AdminLogin extends Component
{
    use ThrottlesLogins;
    
    public $username = '';
    public $password = '';
    public $error = '';

    public function authenticate(Request $request)
    {
        $credentials = $this->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request, $this->username)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request, $this->username, $this);
        }
        if (Auth::guard('admin')->attempt($credentials, false)) {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            $this->incrementLoginAttempts($request, $this->username);
            $this->addError('username', trans('auth.failed'));
            $this->password = '';
            return;
        }
    }

    public function render()
    {
        return view('livewire.admin.auth.login')->layout('layouts.auth');
    }
}
