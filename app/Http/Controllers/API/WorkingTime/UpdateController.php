<?php

namespace App\Http\Controllers\API\WorkingTime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\WorkingTime;

class UpdateController extends Controller
{
    public function __invoke(Request $request){
        $time = WorkingTime::where('id', $request->time_id)->get()[0];
        $times = WorkingTime::where('user_id', $request->user_id)
        ->where('time', $request->time)->get();
        if(count($times)){
            return response(['message' => 'this time alredy exist!!!']);
        }
        if(strlen($request->time) != 5){
            return response(['message'=>'the time most be like hh:mm']);
        }
        $time->update([
            'time' => $request->time
        ]);

        return response($time);
    }
}
