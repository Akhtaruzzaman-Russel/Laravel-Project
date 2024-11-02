@extends('layouts.master')


@section('content')


<div class="card">
  <div class="card-header">
    Add Expense Details
  </div>
  <div class="card-body">

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-error">
        {{ session()->get('error') }}
    </div>
    @endif


    <form  action="{{url('/expense/submit')}}" method="POST" enctype="multipart/form-data">
      @csrf


   <div class="form-group">
     <label for="exampleInputEmail1">Project Name</label>
   
     <select class="form-select" name="project_id" aria-label="Default select example">
      <option selected> Select Project Name</option>

      @foreach ($all as $row )
      <option value="{{$row->id}}">{{$row['project_name']}}</option>
      @endforeach

    </select>
     

   </div>
   




      <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
        <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.querySelector('input[name="date"]').value = today;
         });
        </script>
       
      </div>
     
      <div class="form-group">
        <label for="exampleInputEmail1">Expense Amount</label>
        <input type="text" name="expense_amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Expense Amount">
       
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">Transaction Account</label>
        <input type="text" name="bank_account" value="CASH" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
       
      </div>
    
      <div class="form-group">
                        <label>Note</label>
                        <textarea class="form-control" name="note" id="" cols="30" rows="6" required autocomplete="off"></textarea>
       </div>
      <button type="submit" class="btn btn-dark mt-2">ADD</button>
    </form>
      </div>
    </div>
    @endsection
    