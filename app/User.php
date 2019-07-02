<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function meditation_records()
    {
        return $this->hasMany(Meditation_record::class);
    }
    
    public function trainning_records()
    {
        return $this->hasMany(Trainning_record::class);
    }
    
    public function exw_records()
    {
        return $this->hasMany(Exw_record::class);
    }
}
