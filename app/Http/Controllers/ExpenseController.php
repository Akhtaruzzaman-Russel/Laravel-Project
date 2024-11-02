<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function add(){
        $all = Project::where('status', 0)->orderBy('id', 'ASC')->get();
        // dd($all);
            return view('admin.expense.add', compact('all'));
    }

    public function show(){

        $all=Expense::all();
             
        return view('admin.expense.show',compact('all'));
     }

    public function store(Request $request){
        // dd($request->all());


        $request->validate([
            'project_id' =>'required',
            'date' =>'required',
            'expense_amount' =>'required',
            'bank_account' =>'required',
            'note' =>'required',
        ]);


        $insert=Expense::insertGetId([
            'project_id' => $request->project_id,
            'date' => $request->date,
            'expense_amount' => $request->expense_amount,
            'bank_account_id' => $request->bank_account,
            'note' => $request->note,
            'creator'=> Auth::user()->id,
            'slug' => 'income'.rand(100000, 100000000),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);


        return redirect()->back()->with('success','Data inserted successfully');
    }


    public function edit($id){
        $all=Project::where('status',0)->get();
        $data=Expense::where('id',$id)->firstOrFail();
        return view('admin.expense.edit',compact('data','all'));
      }



      public function update(Request $request){
        //dd($request->all());

        $request->validate([
         
           'project_id' => 'required',  
           'expense_amount' => 'required',
           'date' => 'required',
           'note' => 'required',
           'bank_account' => 'required',
             
       ]);


       $update=Expense::where('id',$request->id)->update([
          'project_id' => $request->project_id,
          'expense_amount' => $request->expense_amount,
          'date' => $request->date,
          'note' => $request->note,
          'bank_account_id' => $request->bank_account,
          'editor' => Auth::user()->id,
          
       ]);
     


          if($update){
              return redirect()->back()->with('success','Data updated successfully');

          }
             else{
              return redirect()->back()->with('error','Data insertion failed');

          }

      }




}
