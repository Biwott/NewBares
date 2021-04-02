<?php

namespace App\Http\Livewire\User\VidPay;


use App\Models\Vidpack;
use App\Models\Vidsub;
use App\Notifications\NotifyVidpackActivated;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubscribeVid extends Component
{
    public function subscribePackage(Vidpack $vidpack)
    {
        $user = Auth::user();
        $cost = $vidpack->cost;
        $balance = $user->balance;       
        if ($vidpack->chances > 0) {
            //This is a First Time Subscriber
            if ($user->video_status == 0) {
                //Check User Balance
                if ($balance >= $cost) {
                    $currBal = $balance - $cost;
                    $user->update([
                        'video_status' => 1,
                        'video_expiry_on' => Carbon::now()->addDays(7)->toDateTimeString(),
                        'balance' => $currBal,
                    ]);
                    Vidsub::create([
                        'user_id' => Auth::id(),
                        'vidpack_id' => $vidpack->id,
                        'expiry_on' => Carbon::now()->addDays(7)->toDateTimeString(),
                        'status' => 1
                    ]);    
                    $user->notify(new NotifyVidpackActivated($vidpack));              
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'success',  'message' => "Successfully Subscribed Video Package!"]
                    );
                    $vidpack->chances->decrement();                   
                } else {
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => "Insufficient Account Balance! Please Top Up."]
                    );
                }
            } elseif ($user->video_status == 1 && $user->video_expiry_on < Carbon::now()->toDateTimeString()) {
                //Check User Balance
                if ($balance >= $cost) {
                    $currBal = $balance - $cost;
                    $user->update([
                        'video_status' => 1,
                        'video_expiry_on' => Carbon::now()->addDays(7)->toDateTimeString(),
                        'balance' => $currBal,
                    ]);
                    Vidsub::create([
                        'user_id' => Auth::id(),
                        'vidpack_id' => $vidpack->id,
                        'expiry_on' => Carbon::now()->addDays(7)->toDateTimeString(),
                        'status' => 1
                    ]);                   
                    $user->notify(new NotifyVidpackActivated($vidpack));

                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'success',  'message' => "Successfully Resubscribed Video Package!"]
                    );
                    $vidpack->chances->decrement();
                } else {
                    $this->dispatchBrowserEvent(
                        'alert',
                        ['type' => 'error',  'message' => "Insufficient Account Balance! Please Top Up."]
                    );
                }
            } elseif ($user->video_status == 1 && $user->video_expiry_on > Carbon::now()->toDateTimeString()) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => "You are already Subscribed to this Package!"]
                );
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "Daily enrollment limit reached! Kindly check in tommorrow!"]
            );
        }
    }
    public function render()
    {
        return view('livewire.user.vid-pay.subscribe-vid', [
            'packages' => Vidpack::where('status', 1)->get(),
        ]);
    }
}
