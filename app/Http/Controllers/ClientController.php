<?php

namespace App\Http\Controllers;

use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function show(){
        $all=Client::all();
        return view('admin.client.show',compact('all'));   
    }


    public function index(){

        return view('admin.client.add');
       }

    public function create(Request $request){
         $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'mobile' => 'required',
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

         if ($request->hasFile('pic')){
            $image = $request->file('pic');
            $ext=$image->getClientOriginalExtension();
            $image_rename = time().'_'.rand(100000, 1000000).'.'.$ext;
            $image->move(public_path('images'), $image_rename);
         }



        // dd($request->all());

        $insert=Client::insertGetId([
            'name'=> $request['name'] ,
            'email'=> $request['email'] ,
            'mobile'=> $request['mobile'] ,
            'pic'=> $image_rename ,
        
        ]);

        if($insert){
            return back()->with('success', 'Data inserted Successfully');
        }else{
            return back()->with('error', 'Data insertion failed');
        }
    }


    public function edit($id){

        $record= Client::FindOrFail($id);
        return view('admin.client.edit', compact('record'));
       }



       public function update(Request $request){
        $id=$request->id;

        $request->validate([
           'name' => 'required|max:255',
           'email' => 'required',
           'mobile' => 'required',
           'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $oldimage= Client::FindOrFail($id);
        $oldimage['pic'];
        $deleteimage= public_path('images/'.$oldimage['pic']);
        $image_rename='';

        if ($request->hasFile('pic')){
           $image = $request->file('pic');
           $ext=$image->getClientOriginalExtension();

           if(file_exists($deleteimage)){
               unlink($deleteimage);
           }  //delete old image if exists

           $image_rename = time().'_'.rand(100000, 1000000).'.'.$ext;
           $image->move(public_path('images'), $image_rename);
        }
        else{
            $image_rename=$oldimage['pic'];
        }



       // dd($request->all());

       $insert=Client::where('id',$id)->update([
           'name'=> $request['name'] ,
           'email'=> $request['email'] ,
           'mobile'=> $request['mobile'] ,
           'pic'=> $image_rename ,
       
       ]);

       if($insert){
           return back()->with('success', 'Data Update Successfully');
       }else{
           return back()->with('error', 'Data Update failed');
       }
   }

    
    public function destroy($id){


        $id=intval($id);
        $client=Client::find($id);

        // $delete=Client::where('id',$id)->delete();




        if($client){

            $imagePath=public_path('images/'.$client['pic']);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
            
            $client->delete();
            return back()->with('success', 'Data deleted Successfully');
       
        } else{
            return back()->with('error', 'Data deletion failed');
        }
    }


}
