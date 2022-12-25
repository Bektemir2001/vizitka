<?php

namespace App\Http\Controllers\User\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;

class IndexController extends Controller
{
    public function __invoke(User $user){
        $services = $user->service;
        return response($services)
                ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }
}
