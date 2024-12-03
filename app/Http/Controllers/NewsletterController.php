<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NewsletterController extends Controller
{
    
    public function index()
    {
        return view('Newsletter');
    }

    public function store(Request $request)
    {
        $users = User::where('is_subscriber', true)->get();
        $message=[
            'greeting'=>'Hi laravel developer',
            'body'=>'This is the email body',
            'actiontext'=>'',
            'actionurl'=>'',
            'lastline'=>'this is the last line',
        ];
        Notification::send($users, new news($message));

        dd("done");

        // if ( ! Newsletter::isSubscribed($request->email) ) 
        // {
        //     Newsletter::subscribePending($request->email);
        //     return redirect('newsletter')->with('success', 'Thanks For Subscribe');
        // }
        // return redirect('newsletter')->with('failure', 'Sorry! You have already subscribed ');
    }
}