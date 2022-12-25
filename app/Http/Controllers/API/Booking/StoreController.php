<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\WorkingTime;
use Illuminate\Support\Carbon;

class StoreController extends Controller
{

    public function __invoke(Request $request){
        $bookings = Booking::where('time_id', $request->time_id)
        ->where('date', $request->date)->get();

        if(count($bookings) != 0){
            return response(['error_message' => 'this time is already taken']);
        }

          
        Booking::create([
            'user_id' => $request->user_id,
            'time_id' => $request->time_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'date' => $request->date,
            'clientToken' => "token"
        ]);
        
        return response(['message' => 'you have successfully booked a seat']);
    }
}
