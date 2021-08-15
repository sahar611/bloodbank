@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
      
          <div class="col-md-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Donations Request</li>
            </ol>
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Donations Request</h3>

          @include('flash::message')
        </div>
        <div class="card-body">
        <div class="filter">
                    {!! Form::open([
                        'method' => 'get'
                    ]) !!}

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                {!! Form::text('keyword',request('keyword'),[
                                    'class' => 'form-control',
                                    'placeholder' => 'search'
                                ]) !!}
                            </div>
                        </div>
                      
                     
                     
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
</div>
       @if(count($records))
       <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Patient Name</th>
                <th>Patient Phone</th> 
                <th>Hospital Name</th> 
                <th>Hospital Address</th> 
                <th>Patient Age</th> 
                <th>city</th>
                <th class="text-center">Show</th>

                <th class="text-center">Delete</th>

              </tr>
            </thead>
          
            <tbody>  
                @foreach($records as $row)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$row->patient_name}}</td>
                <td>{{$row->patient_phone}}</td>
                <td>{{$row->hospital_name}}</td>
                <td>{{$row->hospital_address}}</td>
                <td>{{$row->patient_age}}</td>
                <td>{{$row->city->name}}</td>

               


  <td class="text-center" >
                        <a href="{{url(route('donations.show' , $row->id ))}}" title="Edit" class="btn btn-white btn-link btn-sm" data-original-title="Edit">
                        <i class="fas fa-eye"></i>
</a>
</td>
            
<td class="text-center">
{!! Form::open([
    'action' => ['DonationController@destroy',$row->id],
    'method' => 'delete'
]) !!}
<button type="submit" title="Delete" class="btn btn-danger btn-sm" data-original-title="Remove">
        <i class="fas fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}

                      </td>
              </tr>
  @endforeach
            </tbody>
          </table>
        
       @else
       <div class="col-md-4 col-md-offset-4 text-center alert alert-denger bg-blue">
no data
    </div>
       @endif
        </div>
      
      </div>
      <!-- /.card -->

    </section>
@endsection
