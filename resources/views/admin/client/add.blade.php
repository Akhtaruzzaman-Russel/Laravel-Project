@extends('layouts.master')


@section('content')


<div class="card">
  <div class="card-header">
    Add Client
  </div>
  <div class="card-body">

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif


    <form action="{{url('/client/submit')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
        
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Mobile</label>
        <input type="text" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mobile">
        
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Images</label>
        <input type="file" name="pic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mobile">
        
      </div>


      <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>


  </div>
</div>



@endsection