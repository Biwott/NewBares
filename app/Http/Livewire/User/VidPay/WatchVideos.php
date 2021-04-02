<?php

namespace App\Http\Livewire\User\VidPay;

use App\Models\Package;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WatchVideos extends Component
{
    public $subscribed = '0';
    public $balance;
    public function mount()
    {
        $user = Auth::user();
        $this->balance = $user->vid_balance;
        if ($user->video_expiry_on != null) {

            $createdAt = Carbon::parse($user->video_expiry_on);
            $parsed = $createdAt->format('Y-m-d');
            if ($parsed >= Carbon::now()->toDateString()) {
                $this->subscribed = $user->video_status;
            }
        }
    }
    public function render()
    {
        return view('livewire.user.vid-pay.watch-videos', [
            'videos' => Video::where('free', 0)->where('active', 1)->whereDate('date_active', Carbon::today())->latest()->paginate(20),
            'free_vids' => Video::where('free', 1)->where('active', 1)->get(),
            'packages' => Package::where('status', 1)->get(),

        ]);
    }
}
