<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exw_record;

class Exw_recordsController extends Controller
{
    public function index()
    {
        return view('app');
    }
    
    public function show($id)
    {
        $exw = Exw_record::find($id);
        
        return view('exw_show', [
            'exw' => $exw,
            ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
            'status' => 'required',
            ]);
            
        $request->user()->exw_records()->create([
            'text' => $request->text,
            'status' => $request->status,
            ]);
            
        return view("welcome");
    }
}
