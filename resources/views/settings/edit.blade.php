@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <div class="container-fluid">
            @include('flash::message')

              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Settings</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
    <!-- Main content -->
    <section class="content">
    
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Settings</h3>

       
        </div>
        <div class="card-body">
        {!! Form::model($model,[
                    'action' => ['SettingsController@update',$model->id],
                    'method' => 'put'
                ]) !!}
                <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Facebook Link</label>
                        {!! Form::text('fb_link',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Twitter Link</label>
                        {!! Form::text('tw_link',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">instgram Link</label>
                        {!! Form::text('instgram_link',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">YouTube Link</label>
                        {!! Form::text('youtube_link',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Email</label>
                        {!! Form::text('email',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Phone</label>
                        {!! Form::text('phone',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">contact Text</label>
                        {!! Form::textarea('contact_text',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>  
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">android link</label>
                        {!! Form::text('android_link',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">IOS link</label>
                        {!! Form::text('ios_link',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                      <button type="submit" class="btn btn-primary pull-right">Update</button>
                {!! Form::close() !!}
        </div>
      
      </div>
      <!-- /.card -->

    </section>
@endsection
