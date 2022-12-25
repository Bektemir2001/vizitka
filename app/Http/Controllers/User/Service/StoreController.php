<?php

namespace App\Http\Controllers\User\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(Request $request, User $user){
        $data = $request->validate([
            'name' => '',
            'image' => '',
            'description' => ''
        ]);
        $originName = $data['image']->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $data['image']->getClientOriginalExtension();
        $fileName = $fileName.'_'.time().'.'.$extension;

        $data['image']->move(public_path('images/servics'), $fileName);
        $data['image'] = 'images/services/'+$fileName;
        $service = Service::create([
            'user_id' => $user->id,
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $data['image']
        ]);
        return response($service)
                ->header("Access-Control-Allow-Origin", config('cors.allowed_origins'))
                ->header("Access-Control-Allow-Methods", config('cors.allowed_methods'));
    }
}
