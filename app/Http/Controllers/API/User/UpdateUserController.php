<?php

namespace App\Http\Controllers\API\User;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UpdateUserController extends Controller
{
    public function __invoke(Request $request, User $user){
        
        $data = $request->validate([
            'image' => '',
            'first_name' => 'required',
            'last_name' => '',
            'subject' => 'required',
            'email' => 'required',
            'phone_number' => '',
            'link_to_youtube' => '',
            'link_to_linkedin' => '',
            'link_to_instagram' => '',
            'link_to_telegram' => '',
            'description' => ''
        ]);
        if($data['image']){
            
            $data['image'] = Storage::disk('public')->put('users',$data['image']);
            $data['image'] = '/storage/'.$file;
        }
        else{
            unset($data['image']);
        }  
              
        $user->update($data);
        return redirect()->route('user.index', $user->id);
    }
}