<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class GetDataController extends Controller
{
    public function __invoke(User $user){
        try{
           
            return response($user); 
        }
        catch(\Exception $e){
            return response($e);
        }
        
    }
}
