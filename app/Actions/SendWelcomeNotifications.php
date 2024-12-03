<?php
namespace App\Actions;

use App\Notifications\WelcomeNotifications;
use Closure;
Class SendWelcomeNotifications
{
 
    public function handle($payload,Closure $next)
      {
           $subscriber=$payload['subscriber'];
           $subscriber->notify(new WelcomeNotifications);
           
           return $next($payload);
      }



    
}