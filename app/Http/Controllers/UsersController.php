<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Meditation_record;

use App\Trainning_record;

use App\Exw_record;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        
        $meditations = $user->meditation_records();
        
        $trainnings = $user->trainning_records();
        
        $exws = $user->exw_records();
        
        $time_sum = 0;
        $point_sum = 0;
        
        if($meditations->count() >0)
        {
            foreach($meditations as $meditation)
            {
                $time_sum += $meditation->time;
            }
        }
        if($trainnings->count() > 0)
        {
            foreach($trainnings as $trainning)
            {
                $point_sum += $trainning->point;
            }
        }
        
        
        
        return view('users.show',[
            'user' => $user,
            'exws' => $exws,
            'time_sum' => $time_sum,
            'point_sum' => $point_sum,
        ]);
    }
}
