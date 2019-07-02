<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meditation_record;

class Meditation_recordsController extends Controller
{
    public function index()
    {
        return view('meditation');
    }
    
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'time' => 'required',
            ]);
        
        $request->user()->exw_records()->create([
            'time' => $request->time,
            ]);
            
        return view('welcome');
    }
}
