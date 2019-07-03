<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trainning_record;

class Trainning_recordsController extends Controller
{
    public function index()
    {
        return view('app');
    }
    
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'point' => 'required',
            ]);
        
        $request->user()->trainning_records()->create([
            'point' => $request->point,
            ]);
            
        return view('welcome');
    }
}
