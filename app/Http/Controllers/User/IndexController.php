<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkingTime;

class IndexController extends Controller
{
    public function __invoke(User $user){
        $working_times = WorkingTime::where('user_id', $user->id)->get();
        return view('user.index', compact('user', 'working_times'));
    }
}
