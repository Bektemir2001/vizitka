<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\WorkingTime;
use Illuminate\Support\Carbon;

class ChangeStatusController extends Controller
{
    public function __invoke(Request $request){
        $book = Booking::where('id', $request->id)->get();
        $book[0]->update(['status' => 1]);
        return response(['message' => 'status changed']);
    }
}
