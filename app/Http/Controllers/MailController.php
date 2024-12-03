<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class MailController extends Controller
{
    public $message;
    public function index(Request $request)
    {  
        
        $user=User::where('email', $request->email)->first();
        $message=[
            'greeting'=>'Hi laravel developer',
            'body'=>'This is the email body',
            'actiontext'=>'subscribe please',
            'actionurl'=>'http://localhost:8000/subscribe?email='.$user->email,
            'lastline'=>'this is the last line',
        ];
        Notification::send($user, new news($message));
        dd('sent');


    }
    public function news(user $user)
    {
        $user=user::where('is_subscribed');
    }

    public function FormProcess(Request $request)
    {
        
         $website=$this->validate($request, [
            //'name'=>'required',
            'email'=>'required',
            //'password'=>'required'
         ]);

         //$website['password'] = bcrypt($website['password']);
          // $user = User::create($website);
           ([
            //'user' => $user,
            //'website' => $website,
            //'request' => $request
           ]);
            return response()->make('welcome to our website');
     }

     public function subscribe(Request $request) {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        $user->is_subscriber = true;
        $user->update();

        $user->save();
        
        return redirect('/');
     }


    }

