<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meditation_record extends Model
{
    protected $fillable = ['user_id', 'time'];
    
    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
