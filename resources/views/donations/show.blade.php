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
       
       <table class="table table-bordered table-hover">
            <thead>
              <tr>
               
                <th>Patient Name</th>
                <th>Patient Phone</th> 
                <th>Hospital Name</th> 
                <th>Hospital Address</th> 
                <th>Patient Age</th> 
                <th>city</th>
            

              </tr>
            </thead>
          
            <tbody>  
               
                <tbody>  
                  <tr>
                <td>{{$row->patient_name}}</td>
                    <td>{{$row->patient_phone}}</td>
                    <td>{{$row->hospital_name}}</td>
                    <td>{{$row->hospital_address}}</td>
                    <td>{{$row->patient_age}}</td>
                    <td>{{$row->city->name}}</td>
    
                </tr>
                          </tbody>
                        </table>    
          
     
        </div>
      
      </div>
      <!-- /.card -->

    </section>
@endsection
