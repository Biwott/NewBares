<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function videoHandler(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'videoId' => ['required'],
            'percentage' => ['required'],
            'currentTime' => ['required'],
        ]);
        // Validate the input and return correct response
        if ($validator->fails()) {
            return response()->json(['errors' => 'Error! ecncountered validating credentials!'], 400); // 400 being the HTTP code for an invalid request.
        }

        $video = Video::where('slug', $request->videoId)->first();
        $percentage = $request->percentage;
        $currentTime = $request->currentTime;
        $watch = Watch::where('user_id',  $user->id)->where('video_id', $video->id)->first();

        if ($watch == null) {

            Watch::create([
                'user_id' => $user->id,
                'video_id' => $video->id,
                'percentage' =>  $percentage,
                'time' =>  $currentTime,
                'status' => '0'
            ]);
            
        } else {
            if ($watch->status == 0 && $percentage != 100) {
                $watch->update([
                    'percentage' =>  $percentage,
                    'time' =>  $currentTime,
                    'status' => '0'
                ]);
            } else if ($watch->status == 0 && $percentage == 100) {
                $watch->update([
                    'percentage' =>  $percentage,
                    'time' =>  $currentTime,
                    'status' => '1'
                ]);
                $balance = $user->vid_balance;
                $user->update([
                    'vid_balance' => $balance +  $video->reward,
                ]);
            }
        }
        return response()->json(array(
            'videoId' => $video->id,
            'percentage' => $percentage,
            'timeCode' => $currentTime,
        ), 200);
    }


    public function playHandler(Request $request)
    {

        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'videoId' => ['required'],
        ]);
        // Validate the input and return correct response
        if ($validator->fails()) {
            return response()->json(['errors' => 'Error ecncountered validating credentials!'], 400); // 400 being the HTTP code for an invalid request.
        }

        $video = Video::where('slug', $request->videoId)->first();

        $watch = Watch::where('user_id',  $user->id)->where('video_id', $video->id)->first();
        if ($watch != null) {
            return response()->json(array(
                'timeCode' => $watch->time,
            ), 200);
        }
    }
}
