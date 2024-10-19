@extends('layouts.master')


@section('content')


<div class="card">
  <div class="card-header">
    Update Project
  </div>
  <div class="card-body">

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <form  action="{{url('/project/update')}}" method="POST" enctype="multipart/form-data">
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
        <input type="text" name="project_name" value="{{$data['project_name']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >

       <input type="text" hidden value="{{$data['id']}}" name="id">

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
        <input type="date" name="date" value="{{$data['date']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
       
      </div>
     
      <div class="form-group">
        <label for="exampleInputEmail1">Project Value</label>
        <input type="text" name="project_value" value="{{$data['project_value']}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
       
      </div>
    
      <div class="form-group">
                        <label>Project Description</label>
                        <textarea class="form-control" name="description"  id="" cols="30" rows="6" required autocomplete="off">
                        {{ $data['description'] }}
                        </textarea>
       </div>
      <button type="submit" class="btn btn-dark mt-2">Update</button>
    </form>
      </div>
    </div>
    @endsection
    