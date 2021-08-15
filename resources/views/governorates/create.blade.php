@extends('layouts.app')
@inject('model','App\Models\Governorate')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Governorates</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
    <!-- Main content -->
    <section class="content">
    
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create new governorate</h3>

       
        </div>
        <div class="card-body">
              @include('partials.validation_errors')
                {!! Form::model($model,[
                    'action' => 'GovernorateController@store'
                ]) !!}
              @include('governorates.forms')
                      <button type="submit" class="btn btn-primary pull-right">Create</button>
                {!! Form::close() !!}
        </div>
      
      </div>
      <!-- /.card -->

    </section>
@endsection
