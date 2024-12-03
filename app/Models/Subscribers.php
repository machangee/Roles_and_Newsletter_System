<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
class Subscribers extends Model
{
    use Notifiable;
    protected $fillable = [
        
        'email',    
        
    ];

    public function topics(): BelongsToMany
    {
        return $this->belongsToMany(Topics::class, 'subscribers_topic');
    }

}
