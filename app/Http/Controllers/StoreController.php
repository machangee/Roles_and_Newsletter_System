<?php

namespace App\Http\Controllers;
use App\Models\Subscribers;
use App\Actions\BindToTopic;
use App\Actions\SendWelcomeNotifications;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class StoreController extends Controller
{

    public function __Invoke(Request $request){
      

       $subscriber = Subscribers::create(
        ['email'=>$request->email]
       );

       $topicId = $request->input('topics_ids');
       
       $payload =[
        'subscriber'=>$subscriber,
          'topicId'=>$topicId
          
          ];
     // dd($payload['topicId']);
       $pipes = [
           BindToTopic::class,
           SendWelcomeNotifications::class,
        ];

       // app($this)->send($payload)->through($this->tasks)->thenReturn();
        
        app(Pipeline::class)->send($payload)
                            ->through($pipes)
                            ->thenReturn();
                            

}    
       
}