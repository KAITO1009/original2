<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exw_record extends Model
{
    protected $fillable = ['user_id', 'status', 'text'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
