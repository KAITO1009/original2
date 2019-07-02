<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainning_record extends Model
{
    protected $fillable = ['user_id', 'point'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
