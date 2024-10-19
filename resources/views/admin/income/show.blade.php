@extends('layouts.master')


@section('content')


<div class="card">
  <div class="card-header">
    All Projects
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
            <th scope="col">Project Name</th>
            <th scope="col">Income /Paid Ammount</th>
            <th scope="col">Date</th>
            <th scope="col">Note</th>

            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($all as $row)
                
          <tr>
            <th scope="row">{{$row['id']}}</th>
            <td>{{$row['income']['project_name']}}</td>
            <td>{{$row['income_amount']}}</td>
            <td>{{$row['date']}}</td>
            <td>{{$row['note']}}</td>


            <td>
                
                <a class="btn btn-success btn-sm" href="{{ url('/edit/project',$row->id) }}">Edit</a>
                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="{{ url('/delete',$row->id) }}">Delete</a> 
            
            </td>
 
          </tr>

          @endforeach

        </tbody>
      </table>





  </div>
</div>



@endsection