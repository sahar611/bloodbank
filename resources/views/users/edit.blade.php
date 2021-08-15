@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <div class="container-fluid">
            @include('flash::message')

              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
    <!-- Main content -->
    <section class="content">
    
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit category</h3>

       
        </div>
        <div class="card-body">
        {!! Form::model($model,[
                    'action' => ['UserController@update',$model->id],
                    'method' => 'put'
                ]) !!}
              @include('users.forms')
                      <button type="submit" class="btn btn-primary pull-right">Update</button>
                {!! Form::close() !!}
        </div>
      
      </div>
      <!-- /.card -->

    </section>
@endsection
