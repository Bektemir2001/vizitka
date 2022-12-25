<?php

namespace App\Http\Controllers\API\WorkingTime;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\WorkingTime;

class StoreController extends Controller
{
    public function __invoke(Request $request){
        $time = $request->time;
        if(strlen($time) != 5){
            return response(['message'=>'the time most be like hh:mm']);
        }
        $data = WorkingTime::where('time', $time)
        ->where('user_id', $request->user_id)->get();
        if(count($data) != 0){
            return response(['message'=>'this time alredy exist']);
        }
        WorkingTime::create([
            'user_id' => $request->user_id,
            'time' => $time
        ]);
        $working_times = WorkingTime::where('user_id', $request->user_id)->get();
        return response($working_times);
    }
}
