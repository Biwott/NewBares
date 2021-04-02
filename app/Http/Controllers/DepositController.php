<?php

namespace App\Http\Controllers;

use App\Mail\DepositApproved;
use App\Models\Deposit;
use App\Models\Level;
use App\Models\User;
use App\Notifications\NotifyDepositApproved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DepositController extends Controller
{
    public function depositedFunds()
    {
        $data = file_get_contents('php://input');
        $postData = json_decode($data);
        Storage::disk('local')->put('datest.txt', $data);
        $checkoutID = $postData->Body->stkCallback->CheckoutRequestID;
        $resultCode = $postData->Body->stkCallback->ResultCode;
        if ($resultCode == 0) {
            $deposit = Deposit::where('session', $checkoutID)->orderBy('id', 'DESC')->first();
            if ($deposit->status != 0 || !$deposit) {
                return;
            }
            $amount = $postData->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $transactionNo = $postData->Body->stkCallback->CallbackMetadata->Item[1]->Value;
            $deposit->update(['amount' => $amount]);
            $deposit->update(['reference' => $transactionNo]);
            $deposit->update(['details' => 'Funds Deposit']);
            $deposit->update(['status' => 2]);
            //Update User Balance
            $user = User::find($deposit->user_id);
            Storage::disk('local')->put('amount.txt', $amount);
            $currentBal = $user->balance;
            $finalBal = $deposit->amount + $currentBal;
            $user->update([
                'balance' => $finalBal
            ]);
            $deposit->update(['status' => 1]);
            $user->notify(new NotifyDepositApproved($deposit));
            Mail::to($user->email)->send(new DepositApproved($deposit));
            return;
        }
    }

    public function subscribedPlan()
    {
        $data = file_get_contents('php://input');
        $postData = json_decode($data);
        Storage::disk('local')->put('datest.txt', $data);
        $checkoutID = $postData->Body->stkCallback->CheckoutRequestID;
        $resultCode = $postData->Body->stkCallback->ResultCode;
        if ($resultCode == 0) {
            $deposit = Deposit::where('session', $checkoutID)->orderBy('id', 'DESC')->first();
            if ($deposit->status != 0 || !$deposit) {
                return;
            }
            $amount = $postData->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $transactionNo = $postData->Body->stkCallback->CallbackMetadata->Item[1]->Value;
            $deposit->update(['amount' => $amount]);
            $deposit->update(['reference' => $transactionNo]);
            $deposit->update(['details' => 'Join Fee']);
            $deposit->update(['status' => 2]);
            //Update Referals
            $user = User::find($deposit->user_id);
            $user->update([
                'active' => 1
            ]);
            sendSMS($user->phone, "Welcome to Earnest Ventures! Refer others and Earn with your Referal link: http://earnest.co.ke/register/" . $user->username);
            Storage::disk('local')->put('amount.txt', $amount);
            //Pay Referers
            payReferals($user);
            $deposit->update(['status' => 1]);
            $user->notify(new NotifyDepositApproved($deposit));
            Mail::to($user->email)->send(new DepositApproved($deposit));
            return;
        }
    }
}
