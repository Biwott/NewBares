<?php

namespace App\Http\Livewire\User\Spin;

use App\Models\Segment;
use App\Models\Spin;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class SpinFree extends Component
{
    public $spin_title = 'Free Spin';
    public $spin_sub_title = 'Try your Luck!';
    public $amount = 'Free Spin';
    public $eligible;
    public $instance;


    public function mount()
    {

        $user = Auth::user();
        $this->instance = Spin::where('name', 'Free')->first();
        $this->checkEligible();
    }
    public function checkEligible()
    {
        if ($this->instance->spin_limit < 20) {
            $this->eligible = false;
        } elseif (Carbon::now()->toDateTimeString() < $this->instance->spin_from) {
            $this->eligible = false;
        } elseif ($this->instance->spin_to < Carbon::now()->toDateTimeString()) {
            $eligible = false;
        }else{
            $this->eligible = true;
        }
    }

    public function render()
    {
        return view('livewire.user.spin.spin-free',  [
            'segments' => Segment::get(),
        ]);
    }
}
