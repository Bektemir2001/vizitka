<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(Request $request){
        $data = $request->validate([
            'email' => '',
            'password' => ''
        ]);
        $user = User::where('email', $data['email'])->get();
        if(count($user) != 1){
            return response(['error' => 'Пользователь не найдено'])
                ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
;
        }
        if(Hash::check($data['password'], $user[0]->password)){
            return response($user)
                ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));

        }
        return response(['error' => 'Неверинный пароль'])
                ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));

    }
}
