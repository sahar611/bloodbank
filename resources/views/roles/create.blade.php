@extends('layouts.app')
@inject('perm','Spatie\Permission\Models\Permission')
@inject('model','Spatie\Permission\Models\Role')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <div class="container-fluid">
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
          <h3 class="card-title">Create new category</h3>

       
        </div>
        <div class="card-body">
              @include('partials.validation_errors')
                {!! Form::model($model,[
                    'action' => 'RoleController@store'
                ]) !!}
                <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">name</label>
                        {!! Form::text('name',null,[
                        
                        'class'=>'form-control'
                        
                        ]) !!}

                       
                      </div>
                     
                      <div class="form-group">
                        <label for="name">الصلاحيات</label><br>
                        <input id="select-all" type="checkbox"><label for='select-all'>اختيار الكل</label>

                        <br>
                        <div class="row">
                            @foreach($perm->all() as $permission)
                                <div class="col-sm-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="permissions_list[]" value="{{$permission->id}}"
                                         
                                            >
                                            {{$permission->name}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @push('scripts')
    <script>
        $("#select-all").click(function(){
            $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
        });
    </script>
@endpush

                      <button type="submit" class="btn btn-primary pull-right">Create</button>
                {!! Form::close() !!}
        </div>
      
      </div>
      <!-- /.card -->

    </section>
@endsection
