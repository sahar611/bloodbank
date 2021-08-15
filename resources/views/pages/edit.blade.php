@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <div class="container-fluid">
            @include('flash::message')

              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Pages</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pages</li>
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
                'action' => ['PageController@update',$model->id],
                'method' => 'put',
                'files'=>   true,
                ]) !!}
                @include('partials.validation_errors')

              <div class="form-group">
                    <label for="name">Name</label>
                    {!! Form::text('name',null,[
                    'class' => 'form-control'
                 ]) !!}
                </div>
                <div class="form-group">
                    <label for="body">Content</label>
                    {!! Form::textarea('body',null,[
                    'class' => 'form-control'
                 ]) !!}
                </div>
              
             
                <img style="
    width: 200px;
    height: 200px;
    float: right;
" src="<?php echo asset("uploads/$model->image")?>"/>
  <div class="form-group">
                    <label for="image">image</label>
                  
                    {!! Form::file('image',null,[
                    'class' => 'form-control'
                 ]) !!}
                </div>
                

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Edit</button>
                </div>

                {!! Form::close () !!}
        </div>
      
      </div>
      <!-- /.card -->

    </section>
@endsection
