<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkingTime;
use App\Models\Booking;

class IndexBookController extends Controller
{
    public function __invoke(User $user){
        $books = Booking::where('user_id', $user->id)->orderBy("created_at","DESC")->get();
        $working_times = WorkingTime::where('user_id', $user->id)->get();
        return view('books.index', compact('books', 'working_times', 'user'));
    }
}
