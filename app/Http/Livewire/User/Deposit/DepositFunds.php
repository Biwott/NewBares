<?php

namespace App\Http\Livewire\User\Deposit;

use App\Models\Deposit;
use App\Models\Level;
use App\Models\MpesaAPI;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;



class DepositFunds extends Component
{
    public $phone = '';
    public $amount = '';
    public $inActive = false;
    public $processing = false;
    public function mount()
    {
        $user = Auth::user();
        $this->phone = $user->phone;
        if ($user->active == 0) {
            $this->inActive = true;
            $this->amount = Level::find($user->level_id)->price;
        } else {
            $this->inActive = false;
            $this->amount = '';
        }
    }

    public function loadNotify()
    {
        if (auth()->user()->active == 0) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => "You need to have an active subscription to Join!"]
            );
        }
    }
    public function updatedAmount()
    {
        $data = $this->validate([
            'amount' => ['required', 'numeric', 'between:20,10000'],
        ]);
    }


    public function subscribeUser()
    {
        $mobile = auth()->user()->phone;
        $amount = Level::find(auth()->user()->level_id)->price;
        $stkResponse = $this->sub_STKPushRequest($amount, $mobile);
        $payArray = json_decode($stkResponse, true);
        $payObject = json_decode($stkResponse);
        if (array_key_exists("errorCode", $payArray)) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => $payObject->errorMessage]
            );
            return;
        } else {
            $checkoutID = $payObject->CheckoutRequestID;
            if ($checkoutID == null) {
                $this->subscribeUser();
            }
            $user = User::findOrFail(Auth::id());
            $depo['amount'] = 0.00;
            $depo['session'] = $checkoutID;
            $depo['details'] = $amount;
            $depo['reference'] = 0;
            $depo['status'] = 0;
            $depo['method_id'] = 1;
            $depo['user_id'] = $user->id;
            Deposit::create($depo);
            while (true) {
                if (User::find($user->id)->active == 1) {
                    $message =  ['type' => 'success',  'message' => "Subscription Successful! Welcome to Earnest Ventures!"];
                    session(['notify' => $message]);
                    return redirect()->route('user.dashboard');
                }
                $stkStatus = $this->getSTKStatus($checkoutID);
                $statusArray = json_decode($stkStatus, true);
                $statusObject = json_decode($stkStatus);
                if (!array_key_exists("errorCode", $statusArray)) {
                    if (array_key_exists("ResponseCode", $statusArray)) {
                        $resultcode = $statusObject->ResultCode;
                        if ($resultcode == 0) {
                            $message =  ['type' => 'success',  'message' => "Subscription Successful! Welcome to Earnest Ventures!"];
                            session(['notify' => $message]);
                            return redirect()->route('user.dashboard');
                        } elseif ($resultcode == 1) {
                            $this->dispatchBrowserEvent(
                                'alert',
                                ['type' => 'error',  'message' => 'User balance is insufficient for the transaction!']
                            );
                            return;
                        } elseif ($resultcode == 1031) {
                            $this->dispatchBrowserEvent(
                                'alert',
                                ['type' => 'error',  'message' => 'Request cancelled by user!']
                            );
                            return;
                        } elseif ($resultcode == 1037) {
                            $this->dispatchBrowserEvent(
                                'alert',
                                ['type' => 'error',  'message' => 'Transaction Request Timed out!']
                            );
                            return;
                        } else {
                            $this->dispatchBrowserEvent(
                                'alert',
                                ['type' => 'error',  'message' => 'Transaction Cancelled!']
                            );
                            return;
                        }
                    }
                }
            }
        }
    }

    public function depositFunds()
    {
        $data = $this->validate([
            'amount' => ['required', 'numeric', 'between:20,10000'],
        ]);
        if (auth()->user()->active == 0) {
            $this->subscribeUser();
        } else {
            $mobile = auth()->user()->phone;
            $amount = $data['amount'];
            $stkResponse = $this->stkPushRequest($amount, $mobile);
            $payArray = json_decode($stkResponse, true);
            $payObject = json_decode($stkResponse);
            if (array_key_exists("errorCode", $payArray)) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => $payObject->errorMessage]
                );
                return;
            } else {
                $checkoutID = $payObject->CheckoutRequestID;
                $user = User::findOrFail(Auth::id());
                $depo['amount'] = 0.00;
                $depo['session'] = $checkoutID;
                $depo['details'] = $amount;
                $depo['reference'] = 0;
                $depo['status'] = 0;
                $depo['method_id'] = 1;
                $depo['user_id'] = $user->id;
                Deposit::create($depo);
                while (true) {
                    $stkStatus = $this->getSTKStatus($checkoutID);
                    $statusArray = json_decode($stkStatus, true);
                    $statusObject = json_decode($stkStatus);
                    if (!array_key_exists("errorCode", $statusArray)) {
                        if (array_key_exists("ResponseCode", $statusArray)) {
                            $resultcode = $statusObject->ResultCode;
                            if ($resultcode == 0) {
                                $message =  ['type' => 'success',  'message' => "Payment request Processed Successfully!"];
                                session(['notify' => $message]);
                                return redirect()->route('user.deposit.history');
                            } elseif ($resultcode == 1) {
                                $this->dispatchBrowserEvent(
                                    'alert',
                                    ['type' => 'error',  'message' => 'User balance is insufficient for the transaction!']
                                );
                                return;
                            } elseif ($resultcode == 1031) {
                                $this->dispatchBrowserEvent(
                                    'alert',
                                    ['type' => 'error',  'message' => 'Request cancelled by user!']
                                );
                                return;
                            } elseif ($resultcode == 1037) {
                                $this->dispatchBrowserEvent(
                                    'alert',
                                    ['type' => 'error',  'message' => 'Transaction Request Timed out!']
                                );
                                return;
                            } else {
                                $this->dispatchBrowserEvent(
                                    'alert',
                                    ['type' => 'error',  'message' => 'Transaction Cancelled!']
                                );
                                return;
                            }
                        } else {
                            $this->dispatchBrowserEvent(
                                'alert',
                                ['type' => 'error',  'message' => 'Error Processing Transaction']
                            );
                            return;
                        }
                    }
                }
            }
        }
    }

    public function stkPushRequest($amount, $msisdn)
    {
        $BusinessShortCode = '7437025';
        $LipaNaMpesaPasskey = 'df17f601fd5023bc06fd6307e9fc660740197ec8ab1a1d3308f55b1f8e7ec9f5';
        $TransactionType = 'CustomerBuyGoodsOnline';
        $Amount = $amount;
        $PartyA = $msisdn;
        $PartyB = '5437221';
        $PhoneNumber = $PartyA;
        $CallBackURL = route('callback.deposit');
        $AccountReference = 'CART3';
        $TransactionDesc = 'Lipa_sahizi';
        $Remarks = 'Depositing Funds';
        $mpesa = new MpesaAPI();
        $stkPushSimulation = $mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remarks);
        Storage::disk('local')->put('request.txt', $stkPushSimulation);
        return $stkPushSimulation;
    }

    public function sub_STKPushRequest($amount, $msisdn)
    {
        $BusinessShortCode = '7437025';
        $LipaNaMpesaPasskey = 'df17f601fd5023bc06fd6307e9fc660740197ec8ab1a1d3308f55b1f8e7ec9f5';
        $TransactionType = 'CustomerBuyGoodsOnline';
        $Amount = $amount;
        $PartyA = $msisdn;
        $PartyB = '5437221';
        $PhoneNumber = $PartyA;
        $CallBackURL =  route('callback.subscribe');
        $AccountReference = 'CART3';
        $TransactionDesc = 'Lipa_sahizi';
        $Remarks = 'Depositing Funds';
        $mpesa = new MpesaAPI();
        $stkPushSimulation = $mpesa->STKPushSimulation($BusinessShortCode, $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA, $PartyB, $PhoneNumber, $CallBackURL, $AccountReference, $TransactionDesc, $Remarks);
        Storage::disk('local')->put('request.txt', $stkPushSimulation);
        return $stkPushSimulation;
    }


    public function getSTKStatus($checkoutID)
    {
        $BusinessShortCode = '7437025';
        $CheckoutRequestID = $checkoutID;
        $LipaNaMpesaPasskey = 'df17f601fd5023bc06fd6307e9fc660740197ec8ab1a1d3308f55b1f8e7ec9f5';
        $response = MpesaAPI::STKPushQuery($CheckoutRequestID, $BusinessShortCode, $LipaNaMpesaPasskey);
        return $response;
    }

    public function render()
    {

        return view('livewire.user.deposit.deposit-funds');
    }
}
