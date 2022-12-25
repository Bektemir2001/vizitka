<?php

namespace App\Http\Controllers\API\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;

class DeleteBookController extends Controller
{
    public function __invoke(Request $request){
        $book = Booking::where('id', $request->id)->get();
        $book[0]->delete();
        return response(['message' => 'booking deleted succsesufly']);
    }
}
