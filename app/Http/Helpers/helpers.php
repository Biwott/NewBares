<?php

use App\Http\Controllers\SMSController;
use App\Models\Adminref;
use App\Models\Deposit;
use App\Models\Level;
use App\Models\Referal;
use App\Models\Sms;
use App\Models\User;
use Carbon\Carbon;



if (!function_exists('getRandId')) {
    function getRandId()
    {
        $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        do {
            for ($i = 0; $i < 12; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $user_code = Deposit::where('user_code', $randomString)->get();
        } while (!empty($user_code));
        return $randomString;
    }
}

if (!function_exists('showDateTime')) {
    function showDateTime($date, $format = 'd M, Y h:ia')
    {
        return Carbon::parse($date)->format($format);
    }
}

if (!function_exists('showDiffHuman')) {
    function showDiffHuman($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}

if (!function_exists('month_arr')) {
    function month_arr()
    {
        return [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];
    }
}



if (!function_exists('formatMpesaDate')) {
    function formatMpesaDate($date)
    {
        return date('d M, Y h:ia', strtotime($date));
    }
}

if (!function_exists('setSessionId')) {

    function setSessionId()
    {
        $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        do {
            for ($i = 0; $i < 12; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $user_code = Deposit::where('session', $randomString)->first();
        } while (!empty($user_code));
        return $randomString;
    }
}


if (!function_exists('sendSMS')) {
    function sendSMS($phone, $message)
    {
        $api_key = 'ZWxlZXRnZWVrOk1zb25nYXJpQDEyMw==';
        $from = 'SENDSINE';
        $destination =  '254' . substr($phone, -9);
        $url = 'https://portal.paylifesms.com/sms/api';
        $sms = $message;
        $unicode = 1; //For Unicode Message
        $sms_body = array(
            'api_key' => $api_key,
            'to' => $destination,
            'from' => $from,
            'sms' => $sms,
            'unicode' => $unicode,
        );
        $client = new SMSController();
        $response = $client->send_sms($sms_body, $url);
        Sms::create([
            'user_id' =>  (int)$destination,
            'message' => $message
        ]);
    }
}


if (!function_exists('sendSMS')) {
    function sendSMS($phone, $message)
    {
        $api_key = 'ZWxlZXRnZWVrOk1zb25nYXJpQDEyMw==';
        $from = 'SENDSINE';
        $destination = $phone;
        $url = 'https://portal.paylifesms.com/sms/api';
        $sms = $message;
        $unicode = 1; //For Unicode Message
        $sms_body = array(
            'api_key' => $api_key,
            'to' => $destination,
            'from' => $from,
            'sms' => $sms,
            'unicode' => $unicode,
        );
        $client = new SMSController();
        $response = $client->send_sms($sms_body, $url);
        Sms::create([            
            'phone' => $phone,
            'message' => $message,
            'status' => 1
        ]);
    }
}


if (!function_exists('sendInviteSMS')) {
    function sendInviteSMS($phone, $message)
    {
        // $api_key = 'ZWxlZXRnZWVrOk1zb25nYXJpQDEyMw==';
        // $from = 'SENDSINE';
        // $destination = $phone;
        // $url = 'https://portal.paylifesms.com/sms/api';
        // $sms = $message;
        // $unicode = 1; //For Unicode Message
        // $sms_body = array(
        //     'api_key' => $api_key,
        //     'to' => $destination,
        //     'from' => $from,
        //     'sms' => $sms,
        //     'unicode' => $unicode,
        // );
        // $client = new SMSController();
        // $response = $client->send_sms($sms_body, $url);
        Sms::create([         
            'phone' => $phone,
            'message' => $message,
            'status'=>2
        ]);
    }
}


if (!function_exists('setPrefix')) {
    function setPrefix($prefix, $mobile)
    {
        return $prefix . substr($mobile, -9);
    }
}


if (!function_exists('convertCurrency')) {
    function convertCurrency(User $user, $amount)
    {
        return  $user->currency()->pluck('symbol')[0] . " " . number_format($user->currency()->pluck('exchange')[0] * $amount);
    }
}


if (!function_exists('convertCurrencyDecimal')) {
    function convertCurrencyDecimal(User $user, $amount)
    {
        return  $user->currency()->pluck('symbol')[0] . " " . number_format($user->currency()->pluck('exchange')[0] * $amount, 2, '.', ',');
    }
}



if (!function_exists('payReferals')) {
    function payReferals(User $user)
    {
        $levelData = Level::find(1);
        $userLevels = 0;
        //Pay level 1
        if ($user->referer_id != 0) {
            //Select and pay level 1
            $level1User = User::findorFail($user->referer_id);
            //Level1 must be active
            if ($level1User->active == 1) {
                $level1User->update([
                    'balance' => $level1User->balance + $levelData->level1
                ]);
                Referal::create([
                    'type' => 'Join',
                    'amount' =>   $levelData->level1,
                    'level' => '1',
                    'user_id' => $level1User->id,
                    'referal_id' => $user->id,
                    'status' => 1
                ]);
                $userLevels = $userLevels + 1;
                //Pay level 2 
                if ($level1User->referer_id != 0) {
                    //Select and pay level 2
                    $level2User = User::findorFail($level1User->referer_id);
                    //Level2 must be active
                    if ($level2User->active == 1) {
                        $level2User->update([
                            'balance' => $level2User->balance + $levelData->level2
                        ]);
                        Referal::create([
                            'type' => 'Join',
                            'amount' =>   $levelData->level2,
                            'level' => '2',
                            'user_id' => $level2User->id,
                            'referal_id' => $user->id,
                            'status' => 1
                        ]);
                        $userLevels = $userLevels + 1;
                        //Pay level 3 
                        if ($level2User->referer_id != 0) {
                            //Select and pay level 3
                            $level3User = User::findorFail($level2User->referer_id);
                            //Level2 must be active
                            if ($level3User->active == 1) {
                                $level3User->update([
                                    'balance' => $level3User->balance + $levelData->level3
                                ]);
                                Referal::create([
                                    'type' => 'Join',
                                    'amount' =>   $levelData->level3,
                                    'level' => '3',
                                    'user_id' => $level3User->id,
                                    'referal_id' => $user->id,
                                    'status' => 1
                                ]);
                                $userLevels = $userLevels + 1;
                            }
                        }
                    }
                }
            }
        }
        //Create Admin Referals
        if ($userLevels == 0) {
            Adminref::create([
                'type' => 'Join',
                'amount' => $levelData->price,
                'level' => '0',
                'user_id' => $user->id,
                'status' => 1
            ]);
        } elseif ($userLevels == 1) {

            Adminref::create([
                'type' => 'Join',
                'amount' => 250,
                'level' => '1',
                'user_id' => $user->id,
                'status' => 1
            ]);
        } elseif ($userLevels == 2) {

            Adminref::create([
                'type' => 'Join',
                'amount' => 100,
                'level' => '2',
                'user_id' => $user->id,
                'status' => 1
            ]);
        } elseif ($userLevels == 3) {

            Adminref::create([
                'type' => 'Join',
                'amount' => 50,
                'level' => '3',
                'user_id' => $user->id,
                'status' => 1
            ]);
        }
    }
}


if (!function_exists('reverseReferals')) {
    function reverseReferals(User $user)
    {

        $levelData = Level::find(1);
        //Deduct level 1
        if ($user->referer_id > 0) {
            //Select and deduct level 1
            $level1User = User::find($user->referer_id);
            //Level1 must be active
            if ($level1User != null && $level1User->active == 1) {
                $level1User->update([
                    'balance' => $level1User->balance - $levelData->level1
                ]);
                Referal::create([
                    'type' => 'Join',
                    'amount' =>   -$levelData->level1,
                    'level' => '1',
                    'user_id' => $level1User->id,
                    'referal_id' => $user->id,
                    'status' => 2
                ]);
                //Pay level 2 
                if ($level1User->referer_id > 0) {
                    //Select and pay level 2
                    $level2User = User::find($level1User->referer_id);
                    //Level2 must be active
                    if ($level2User != null && $level2User->active == 1) {
                        $level2User->update([
                            'balance' => $level2User->balance - $levelData->level2
                        ]);
                        Referal::create([
                            'type' => 'Join',
                            'amount' =>   -$levelData->level2,
                            'level' => '2',
                            'user_id' => $level2User->id,
                            'referal_id' => $user->id,
                            'status' => 2
                        ]);
                        //Pay level 3 
                        if ($level2User->referer_id > 0) {
                            //Select and pay level 3
                            $level3User = User::findorFail($level2User->referer_id);
                            //Level2 must be active
                            if ($level3User != null && $level3User->active == 1) {
                                $level3User->update([
                                    'balance' => $level3User->balance - $levelData->level3
                                ]);
                                Referal::create([
                                    'type' => 'Join',
                                    'amount' =>   -$levelData->level3,
                                    'level' => '3',
                                    'user_id' => $level3User->id,
                                    'referal_id' => $user->id,
                                    'status' => 2
                                ]);
                            }
                        }
                    }
                }
            }
        }
        Adminref::create([
            'type' => 'Join',
            'amount' => -$levelData->price,
            'level' => '0',
            'user_id' => $user->id,
            'status' => 2
        ]);
    }
}
