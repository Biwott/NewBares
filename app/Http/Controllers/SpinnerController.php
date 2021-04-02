<?php

namespace App\Http\Controllers;

use App\Models\Spin;
use App\Models\Spingrid;
use App\Models\Spinning;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SpinnerController extends Controller
{
    public function spinHandler(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'amount' => ['required', 'integer', 'between:20,3000'],
            'instance' => ['required'],
        ]);
        // Validate the input and return correct response
        if ($validator->fails()) {
            return response()->json(['errors' => 'Invalid credentials supplied!'], 400); // 400 being the HTTP code for an invalid request.
        }

        $balance = $user->balance;
        $amount = $request->amount;
        $instance = Spin::where('name', $request->instance)->first();
        if ($instance != null && $instance->name == 'Normal') {
            if ($balance < $amount) {
                return response()->json(['errors' => 'Insufficient account balance!'], 400);
            }
            //
            $spin_amount = round($amount, -1);
            $spingrid = Spingrid::where('amount',  $spin_amount)->first();
            if ($spingrid === null) {
                $gain = round(($spin_amount / 2), -1);
                $loss = $gain;
                $spingrid = Spingrid::create([
                    'amount' =>  $spin_amount,
                    'loss' =>  $loss,
                    'gain' =>   $gain,
                    'count' =>  1
                ]);
            }
            //Winning
            if (($spingrid->count) % 29 == 0) {
                $spinning = Spinning::create([
                    'user_id' => $user->id,
                    'spin_id' => $spingrid->id,
                    'count' => $spingrid->count,
                    'amount' => $amount,
                    'status' => '1',
                    'winning' => $spingrid->gain * 2,
                    'type' => 'Normal'
                ]);
                $user->update([
                    'balance' => $user->balance + $spinning->winning,
                ]);
                $spingrid->increment('count');
                $index = rand(1, 18);
                $angle = ($index * 20) - rand(0, 18);
                $value = 'Ksh ' .  intval($spinning->winning + $amount);
                return response()->json(array(
                    'stepper' =>  $angle,
                    'index' => $index,
                    'value' => $value
                ), 200);
            } elseif (($spingrid->count) % 3 == 0) {
                $spinning = Spinning::create([
                    'user_id' => $user->id,
                    'spin_id' => $spingrid->id,
                    'count' => $spingrid->count,
                    'amount' => $amount,
                    'status' => '1',
                    'winning' => $spingrid->gain,
                    'type' => 'Normal'
                ]);
                $user->update([
                    'balance' => $user->balance + $spinning->winning,
                ]);
                $spingrid->increment('count');
                $index = rand(1, 18);
                $angle = ($index * 20) - rand(0, 18);
                $value = 'Ksh ' .  intval($spinning->winning + $amount);
                return response()->json(array(
                    'stepper' =>  $angle,
                    'index' => $index,
                    'value' => $value
                ), 200);
            } else {
                //Losing
                $spinning = Spinning::create([
                    'user_id' => $user->id,
                    'spin_id' => $spingrid->id,
                    'count' => $spingrid->count,
                    'amount' => $amount,
                    'status' => '2',
                    'winning' => $spingrid->loss,
                    'type' => 'Normal'
                ]);
                $user->update([
                    'balance' => $user->balance - $spinning->winning,
                ]);
                $spingrid->increment('count');
                $index = rand(1, 18);
                $angle = ($index * 20) - rand(0, 18);
                $value = 'Ksh ' .  intval($spinning->winning);
                return response()->json(array(
                    'stepper' =>  $angle,
                    'index' => $index,
                    'value' => $value
                ), 200);
            }
        } elseif ($instance != null && $instance->name == 'Welcome') {
            if ($user->welcome_spin == 1) {
                return response()->json(['errors' => 'You have already Used up your free welcome spin!'], 400);
            }
            $spin_amount = 100;
            $spingrid = Spingrid::where('amount',  $spin_amount)->first();
            if ($spingrid === null) {
                $gain = round(($spin_amount / 2), -1);
                $loss = $gain;
                $spingrid = Spingrid::create([
                    'amount' =>  $spin_amount,
                    'loss' =>  $loss,
                    'gain' =>   $gain,
                    'count' =>  1
                ]);
            }
            //Winning
            if (($spingrid->count) % 3 == 0) {
                $spinning = Spinning::create([
                    'user_id' => $user->id,
                    'spin_id' => $spingrid->id,
                    'count' => $spingrid->count,
                    'amount' => $amount,
                    'status' => '1',
                    'winning' => $spingrid->gain,
                    'type' => 'Welcome'
                ]);
                $user->update([
                    'balance' => $user->balance + $spinning->winning + $amount,
                    'welcome_spin' => '1'
                ]);
                $spingrid->increment('count');
                $index = rand(1, 18);
                $angle = ($index * 20) - rand(0, 18);
                $value = 'Ksh ' .  intval($spinning->winning + $amount);
                return response()->json(array(
                    'stepper' =>  $angle,
                    'index' => $index,
                    'value' => $value
                ), 200);
            } else {
                //Losing
                $spinning = Spinning::create([
                    'user_id' => $user->id,
                    'spin_id' => $spingrid->id,
                    'count' => $spingrid->count,
                    'amount' => $amount,
                    'status' => '2',
                    'winning' => $spingrid->loss,
                    'type' => 'Welcome'
                ]);
                $user->update([
                    'balance' => $user->balance + $spinning->winning,
                    'welcome_spin' => 1
                ]);
                $spingrid->increment('count');
                $index = rand(1, 18);
                $angle = ($index * 20) - rand(0, 18);
                $value = 'Ksh ' .  intval($spinning->winning);
                return response()->json(array(
                    'stepper' =>  $angle,
                    'index' => $index,
                    'value' => $value
                ), 200);
            }
        } elseif ($instance != null && $instance->name == 'Free') {


            if (Carbon::parse($user->last_spin_at)->diffInSeconds(Carbon::now()) < 20) {
                return;
            }
            if ($instance->spin_limit < 20) {
                return response()->json(['errors' => 'Free Spin Limit Reached! Check try next time!'], 400);
            } elseif (Carbon::now()->toDateTimeString() < $instance->spin_from) {
                return response()->json(['errors' => 'No more Free Spins. Check Later'], 400);
            } elseif ($instance->spin_to < Carbon::now()->toDateTimeString()) {
                return response()->json(['errors' => 'No more Free Spins. Check Later'], 400);
            } else {
                $user->update([
                    'last_spin_at' => Carbon::now()->toDateTimeString()
                ]);
            };


            $spin_amount = 20;
            $spingrid = Spingrid::where('amount',  $spin_amount)->first();
            if ($spingrid === null) {
                $gain = round(($spin_amount / 2), -1);
                $loss = $gain;
                $spingrid = Spingrid::create([
                    'amount' =>  $spin_amount,
                    'loss' =>  $loss,
                    'gain' =>   $gain,
                    'count' =>  1
                ]);
            }
            //Winning
            if (($spingrid->count) % 3 == 0) {
                $spinning = Spinning::create([
                    'user_id' => $user->id,
                    'spin_id' => $spingrid->id,
                    'count' => $spingrid->count,
                    'amount' => $amount,
                    'status' => '1',
                    'winning' => $spingrid->gain,
                    'type' => 'Free'
                ]);
                $user->update([
                    'balance' => $user->balance + $spinning->winning + $amount,
                    'welcome_spin' => '1'
                ]);
                $spp = Spin::where('name', 'Free')->first();
                $instance->update([
                    'spin_limit' => $spp->spin_limit - ($spinning->winning + $amount),
                ]);
                $spingrid->increment('count');
                $index = rand(1, 18);
                $angle = ($index * 20) - rand(0, 18);
                $value = 'Ksh ' .  intval($spinning->winning + $amount);
                return response()->json(array(
                    'stepper' =>  $angle,
                    'index' => $index,
                    'value' => $value
                ), 200);
            } else {
                //Losing
                $spinning = Spinning::create([
                    'user_id' => $user->id,
                    'spin_id' => $spingrid->id,
                    'count' => $spingrid->count,
                    'amount' => $amount,
                    'status' => '2',
                    'winning' => $spingrid->loss,
                    'type' => 'Free'
                ]);
                $user->update([
                    'balance' => $user->balance + $spinning->winning,
                    'welcome_spin' => 1
                ]);
                $spp = Spin::where('name', 'Free')->first();
                $instance->update([
                    'spin_limit' => $spp->spin_limit - $spinning->winning,
                ]);
                $spingrid->increment('count');
                $index = rand(1, 18);
                $angle = ($index * 20) - rand(0, 18);
                $value = 'Ksh ' .  intval($spinning->winning);
                return response()->json(array(
                    'stepper' =>  $angle,
                    'index' => $index,
                    'value' => $value
                ), 200);
            }
        }
    }
}
