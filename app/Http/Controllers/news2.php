<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class news2 extends Controller
{
    public function about(Request $request) {
        $website = $request->validate([
            'name' =>'required',
            'email'=>'required',
            'password'=>'required'
            
        ]);
        
        
           $website['password'] = bcrypt($website['password']);
           User::create($website);
           return response()->make('welcome to our website');
     }
}
