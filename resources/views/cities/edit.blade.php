@extends('layouts.app')
@inject('governorates','App\Models\Governorate')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <div class="container-fluid">
            @include('flash::message')

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
        {!! Form::model($model,[
                'action' => ['CityController@update',$model->id],
                'method' => 'put'
                ]) !!}
                @include('partials.validation_errors')

                @include('cities.forms')


                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Edit</button>
                </div>

                {!! Form::close () !!}
        </div>
      
      </div>
      <!-- /.card -->

    </section>
@endsection
