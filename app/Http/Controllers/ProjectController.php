<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Project;

class ProjectController extends Controller
{
    public function add(){
        $all = Client::all();
            return view('admin.project.add', compact('all'));
    }

    public function show(){
        $all=Project::all();
        return view('admin.project.show', compact('all'));
    }

    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            'client_id' =>'required',
            'project_name' =>'required',
            'date' =>'required',
            'project_value' =>'required',
            'description' =>'required'
        ]);

        $insert=Project::insertGetId([
            'client_id' =>$request->client_id,
            'project_name' =>$request->project_name,
            'date' =>$request->date,
            'project_value' =>$request->project_value,
            'description' =>$request->description,
            'creator'=> Auth::user()->id,
            'slug' =>uniqid().rand(10000,10000000),
        
        ]);

        if($insert){
            return back()->with('success', 'Data inserted Successfully');
        }else{
            return back()->with('error', 'Data insertion failed');
        }

    }


    public function edit($id){
        $all = Client::all();
        $data=Project::where('id', $id)->firstOrFail();

        return view('admin.project.edit', compact('data', 'all'));
    }



    public function update(Request $request){
        // dd($request->all());

        $request->validate([
            'client_id' =>'required',
            'project_name' =>'required',
            'date' =>'required',
            'project_value' =>'required',
            'description' =>'required'
        ]);

        $id=$request->id;

        $update=Project::where('id', $id)->update([
            'client_id' =>$request->client_id,
            'project_name' =>$request->project_name,
            'date' =>$request->date,
            'project_value' =>$request->project_value,
            'description' =>$request->description,
            'editor'=> Auth::user()->id,

        
        ]);

        if($update){
            return back()->with('success', 'Data Update Successfully');
        }else{
            return back()->with('error', 'Data insertion failed');
        }

    }
    
}
