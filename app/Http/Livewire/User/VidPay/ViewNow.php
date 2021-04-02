<?php

namespace App\Http\Livewire\User\VidPay;

use App\Models\Video;
use Livewire\Component;

class ViewNow extends Component
{
    public $video;

    public function mount(Video $video)
    {
        $this->video = $video;
    }
    public function render()
    {
        return view('livewire.user.vid-pay.view-now');
    }
}
