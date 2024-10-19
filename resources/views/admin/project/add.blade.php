@extends('layouts.master')


@section('content')


<div class="card">
  <div class="card-header">
    Add Project Details
  </div>
  <div class="card-body">

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <form  action="{{url('/project/submit')}}" method="POST" enctype="multipart/form-data">
      @csrf


   <div class="form-group">
     <label for="exampleInputEmail1">Client Name</label>
   
     <select class="form-select" name="client_id" aria-label="Default select example">
      <option selected> Select Client Name</option>
      @foreach ($all as $row )
      <option value="{{$row->id}}">{{$row['name']}}</option>
      @endforeach
    </select>
     

   </div>
   

      <div class="form-group">
        <label for="exampleInputEmail1">Project Name</label>
        <input type="text" name="project_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Poject Name">
       
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
        <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
       
      </div>
     
      <div class="form-group">
        <label for="exampleInputEmail1">Project Value</label>
        <input type="text" name="project_value" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Project Value">
       
      </div>
    
      <div class="form-group">
                        <label>Project Description</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="6" required autocomplete="off"></textarea>
       </div>
      <button type="submit" class="btn btn-dark mt-2">ADD</button>
    </form>
      </div>
    </div>
    @endsection
    