<?php

namespace App\Http\Livewire\User\Package;

use App\Models\User;
use App\Models\Package;
use App\Models\Referal;
use Livewire\Component;
use App\Models\Subscription;
use App\Notifications\NotifyInvestmentBonus;
use App\Notifications\NotifyPackageActivated;
use App\Notifications\NotifyReferalBonus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SubscribePackage extends Component
{
    public $user;
    public function mount()
    {
        $this->user = Auth::user();
    }
    public function subscribePackage(Package $package)
    {
        $cost = $package->cost;
        $balance = $this->user->balance;
        if ($this->user->status == 0) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "You Have Been Banned from the System!"]
            );
        }
        //This is a First Time Subscriber
        if ($this->user->package_status == 0) {
            //Check User Balance
            if ($balance >= $cost) {
                $currBal = $balance - $cost;
                $this->user->update([
                    'package_status' => 1,
                    'balance' => $currBal,
                ]);
                //Pay Next Slotted User if Valid
                if (($package->count) % 2 == 0) {
                    $paySlot = $package->slot;
                    $subscription = Subscription::where('count', '=', $paySlot)->where('package_id', '=', $package->id)->where('status', 0)->first();
                    if ($subscription != null) {
                        $payUser = User::find($subscription->user_id);
                        //Pay the Slotted User if Not Banned
                        if ($payUser->status != 0) {
                            $payUser->update([
                                'balance' => $payUser->balance + $package->earning
                            ]);
                            //Mark user as paid
                            Subscription::where('count', $paySlot)
                                ->where('package_id', $package->id)
                                ->update(['status' => 1]);
                            //Send Notifications
                            $invBonus = ($package->cost + ($package->cost / 2));
                            $formatInvBonus = convertCurrency($payUser, $invBonus);
                            //sendSMS($payUser->phone, "Your EARNEST investment of " . $formatInvBonus . " is ready! Invest and Earn more. http://www.earnest.co.ke/");
                            $payUser->notify(new NotifyInvestmentBonus($package));
                        }
                    } else {
                        //Log Error!
                    }
                    $package->increment('slot');
                }
                $count = $package->count;
                //Pay Referer of this user if esxists
                if ($this->user->referer_id != 0) {
                    $referer = User::find($this->user->referer_id);
                    //Must not be banned
                    if ($referer->status != 0) {
                        $refCommision = $package->cost * ($package->commision / 100);
                        $referer->update([
                            'balance' => $referer->balance + $refCommision
                        ]);
                        Referal::create([
                            'type' => 'invest',
                            'amount' =>   $refCommision,
                            'level' => '1',
                            'user_id' => $referer->id,
                            'status' => 1
                        ]);
                        //Notify Referer
                        $referer->notify(new NotifyReferalBonus($package));;
                        $refBonus = ($package->cost * 0.1);
                    }
                }
                Subscription::create([
                    'user_id' => Auth::id(),
                    'count' => $count,
                    'package_id' => $package->id,
                    'status' => 0
                ]);
                $package->increment('count');
                //sendSMS($this->user->phone, "EARNEST VENTURES- Successfully Purchased  " . $package->name . " Package. Your Referal link is: " . url('/') . '/register/' . $user->username);
                $this->user->notify(new NotifyPackageActivated($package));
                $message =  ['type' => 'success',  'message' => "Successfully Purchased!"];
                session(['notify' => $message]);
                redirect()->route('user.package.history');
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => "Insufficient Account Balance! Please Top Up."]
                );
            }
        } elseif ($this->user->package_status == 1 && !Subscription::where('user_id', Auth::id())->where('package_id', $package->id)->where('status', 0)->exists()) {

            if ($balance >= $cost) {
                $currBal = $balance - $cost;
                $this->user->update([
                    'balance' => $currBal,
                ]);
                //Pay Next Slot
                if (($package->count) % 2 == 0 && $package->count != 0) {
                    $paySlot = $package->slot;
                    $subscription = Subscription::where('count', '=', $paySlot)->where('package_id', '=', $package->id)->where('status', 0)->first();
                    if ($subscription != null) {
                        $payUser = User::find($subscription->user_id);
                        //Pay the Slotted User if Not Banned
                        if ($payUser->status != 0) {
                            //Make payedUser eligible for resubscrition
                            Subscription::where('count', $paySlot)
                                ->where('package_id', $package->id)
                                ->update(['status' => 1]);
                            $payUser->update([
                                'balance' => $payUser->balance + $package->earning
                            ]);
                            // Notify investor
                            $invBonus = ($package->cost + ($package->cost / 2));
                            $formatInvBonus = convertCurrency($payUser, $invBonus);
                            //sendSMS($payUser->phone, "Your EARNEST Bonus of " . $formatInvBonus . " has Matured! Continue Investing to Earn more. http://www.earnest.co.ke/");
                            $payUser->notify(new NotifyInvestmentBonus($package));
                        }
                    } else {
                        //Log Error!
                    }
                    $package->increment('slot');
                }
                $count = $package->count;
                Subscription::create([
                    'user_id' => Auth::id(),
                    'count' => $count,
                    'package_id' => $package->id,
                    'status' => 0
                ]);
                $package->increment('count');
                //Notify Subscriber
                // sendSMS($user->phone, "EARNEST VENTURES- Successfully Purchased  " . $package->name . " Package. Your Referal link is: " . url('/') . '/register/' . $user->username);
                // $user->notify(new NotificationPackageActivated($package));
                $message =  ['type' => 'success',  'message' => "Successfully Purchased Package!"];
                session(['notify' => $message]);
                redirect()->route('user.package.history');
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => "Balance Insufficient for Upgrade! Please Top Up."]
                );
            }
        } elseif (Subscription::where('user_id', Auth::id())->where('package_id', $package->id)->where('status', 0)->exists()) {
            $message = ['type' => 'error',  'message' => "Failed! You currently have an active subscription with this package!"];
            session(['notify' => $message]);
            redirect()->route('user.package.history');
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => "General Error Encoutered!"]
            );
        }
    }
    public function render()
    {
        return view('livewire.user.package.subscribe-package', [
            'packages' => Package::where('status', 1)->get(),
        ]);
    }
}
