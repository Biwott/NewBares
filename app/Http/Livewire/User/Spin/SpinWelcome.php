<?php

namespace App\Http\Livewire\User\Spin;

use App\Models\Segment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SpinWelcome extends Component
{
    public $spin_title = 'Welcome Spin';
    public $spin_sub_title = 'Try your Luck!';
    public $amount = 'Welcome Spin';
    public $eligible = true;
    public function mount()
    {
        $user = Auth::user();
        if ($user->welcome_spin == 1) {
            $this->eligible = false;
        }
    }
    public function render()
    {
        return view('livewire.user.spin.spin-welcome',  [
            'segments' => Segment::get(),
        ]);
    }
}
