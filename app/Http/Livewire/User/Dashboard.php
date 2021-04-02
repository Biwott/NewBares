<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Dashboard extends Component
{
    public function loadNotify()
    {
        $value = session('notify');
        if ($value != null) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => $value['type'],  'message' => $value['message']]
            );
            Session::forget('notify');
        }
    }
    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
