<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request){
        $data = $request([
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
        ]);
        $validate_user = User::where('email', $data['email'])->get();
        if(count($user)){
            return response(['error' => 'Пользователь уже существует!'])
                    ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                    ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));

        }
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return response($user)
                ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));

    }
}
