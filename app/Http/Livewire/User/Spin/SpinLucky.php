<?php

namespace App\Http\Livewire\User\Spin;

use Livewire\Component;
use App\Models\Segment;
use Illuminate\Support\Facades\Auth;

class SpinLucky extends Component
{
    public $spin_title = 'Lucky Spin';
    public $spin_sub_title = 'Try your Luck!';
    public $amount = '20';
    public $balance = '';
    protected $listeners = ['update-balance' => 'updatedAmount'];
    public function mount()
    {
        $this->balance = Auth::user()->balance;
    }

    public function updatedAmount()
    {
        $this->validate([
            'amount' => ['required', 'integer', 'between:20,3000'],
        ]);
        $this->balance = Auth::user()->balance;
    }
    public function validateAmount()
    {
        $this->validate([
            'amount' => ['required', 'integer', 'between:20,3000'],
        ]);
    }
    public function render()
    {
        return view('livewire.user.spin.spin-lucky',  [
            'segments' => Segment::get(),
        ]);
    }
}
