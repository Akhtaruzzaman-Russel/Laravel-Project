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


    <table class="table table-success table-striped table-bordered ">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($all as $row)
                
          <tr>
            <th scope="row">{{$row['id']}}</th>
            <td>{{$row['name']}}</td>
            <td>{{$row['email']}}</td>
            <td>{{$row['mobile']}}</td>
            <td>
                <img src="{{asset('images/'.$row['pic'])}}" style="width: 100px; height: 100px;" alt="Image">
            </td>
            <td>
                
                <a class="btn btn-success btn-sm" href="{{ url('/edit/client',$row->id) }}">Edit</a>
                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="{{ url('/delete',$row->id) }}">Delete</a> 
            
            </td>
 
          </tr>

          @endforeach

        </tbody>
      </table>





  </div>
</div>



@endsection