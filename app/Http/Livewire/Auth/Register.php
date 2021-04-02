<?php

namespace App\Http\Livewire\Auth;

use App\Mail\WelcomeMail;
use App\Models\Currency;
use App\Models\Level;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class Register extends Component
{
    public $firstName = '';
    public $lastName = '';
    public $email = '';
    public $phone = '';
    public $username = '';
    public $country = '';
    public $password = '';
    public $confirmation = '';
    public $terms = '';
    public $package = '';
    public $refered_by = 0;
    public $referer_id = 0;
    public $error_message;



    public function mount($referer = 'x')
    {

        $user = User::where('username', $referer)->first();
        if ($user == null && $referer != 'x') {
            $this->error_message = 'Your Referer DOES NOT Exist';
        } elseif ($user != null && $user->active > 0) {
            $this->refered_by = $user->username;
            $this->referer_id = $user->id;
        } elseif ($user != null && $user->active == 0) {
            $this->error_message = 'Cannot be referred by UNSUBSCRIBED user!';
        }
    }
    public function updatedUsername()
    {
        $this->validate([
            'username' => ['required', 'string', 'max:20', 'min:4', 'alpha_dash', 'unique:users'],
        ]);
    }
    public function updatedEmail()
    {
        $this->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }
    public function updatedPackage()
    {
        if ($this->country != null) {
            $this->phone = setPrefix(Currency::find($this->country)->prefix,  $this->phone);
        }
    }
    public function updatedCountry()
    {
        if ($this->country != null) {
            $this->phone = setPrefix(Currency::find($this->country)->prefix,  $this->phone);
        }
    }
    public function register()
    {
        if ($this->country != null) {
            $this->phone = setPrefix(Currency::find($this->country)->prefix,  $this->phone);
        }

        $data = $this->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'username' => ['required', 'string', 'max:20', 'min:4', 'alpha_dash', 'unique:users'],
            'phone' => ['required', 'unique:users', 'min:10', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'terms' => ['accepted'],
            'package' => ['required'],
            'referer_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'same:confirmation'],

        ]);

        //Invalidate inactive referals
        if ($data['referer_id'] != null) {
            $ref = User::find($data['referer_id']);
            if ($ref->active == 0) {
                $data['referer_id'] = 0;
            }
        }

        $user = User::create([
            'first_name' => $data['firstName'],
            'last_name' =>  $data['lastName'],
            'email' =>  $data['email'],
            'phone' =>  $data['phone'],
            'username' =>  Str::lower($data['username']),
            'currency_id' => $data['country'],
            'level_id' => $data['package'],
            'referer_id' =>  $data['referer_id'],
            'password' => Hash::make($data['password']),
        ]);

        if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            Mail::to($user->email)->send(new WelcomeMail());
            return redirect()->intended(route('user.dashboard'));
        }
    }
    public function render()
    {
        return view('livewire.auth.register',  [
            'currencies' => Currency::get(),
            'levels' => Level::get()
        ])->layout('layouts.auth');
    }
}
