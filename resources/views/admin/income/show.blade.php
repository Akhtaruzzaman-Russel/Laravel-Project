@extends('layouts.master')


@section('content')


<div class="card">
  <div class="card-header">
    All Projects
  </div>
  <div class="card-body">



    <form method="GET" action="{{url('/income/filter')}}">


	


      <div class="row mb-3">
                 <div class="col-md-4">
                   <div class="form-group">
                        <label> Start Date</label>
                        <input type="date" class="form-control " data-date-today-highlight="true" data-date-format="yyyy-mm-dd" name="start_date" required autocomplete="off">
    
                    </div>
                 </div>
                 <div class="col-md-8">
    
                   <div class="row">
                     <div class="col-md-6">
                       <div class="form-group">
                        <label> End Date</label>
                        <input type="date" class="form-control " data-date-today-highlight="true" data-date-format="yyyy-mm-dd" name="end_date" required autocomplete="off">
    
                    </div>
                     </div>
                     <div class="col-md-6  mt-1">
                       <div class="row">
                         <div class="col-md-2">
                           <div class="form-group pt-2">
                       
                        <button type="submit" class="btn btn-outline-primary ">Filter</button>
                    </div>
                         </div>
                    <div class="col-md-2">
                      <div class="form-group pt-2">
                       
                        
                        <a href="{{url('/income/show')}}" type="submit" class="btn btn-outline-primary ">Reset</a>
                    </div>
                    </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 
    
                    
               </div>
    </form>

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
                
                <a class="btn btn-success btn-sm" href="{{ url('/income/edit',$row->id) }}">Edit</a>
                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" href="{{ url('/delete',$row->id) }}">Delete</a> 
                <a class="btn btn-success btn-sm" href="{{ url('/invoice/create',$row->id) }}">Invoice</a>
                <a class="btn btn-success btn-sm" href="{{ url('/invoice/pdf',$row->id) }}">PDF</a>
            
            </td>
 
          </tr>

          @endforeach

        </tbody>
      </table>





  </div>
</div>



@endsection