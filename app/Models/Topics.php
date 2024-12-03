<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Topics extends Model
{
    protected $fillable =[
        'title','description'
    ];


    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(Subscriber::class, 'subscribers_topic');
    }

   
}
