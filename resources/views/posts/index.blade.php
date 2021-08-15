@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
      
          <div class="col-md-6">
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div>
          <div class="col-md-6 text-right">
                <a href="{{route('posts.create')}}" class="btn btn-primary btn-white">Add New Post</a>
                
                </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of Posts</h3>

          @include('flash::message')
        </div>
        <div class="card-body">
            

       @if(count($records))
       <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>name</th>
                <th>category</th>
                <th>Content</th>

                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>

              </tr>
            </thead>
          
            <tbody>  
                @foreach($records as $row)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->category->name}}</td>
                <td>{{$row->body}}</td>

                <td class="text-center" >
                        <a href="{{url(route('posts.edit' , $row->id ))}}" title="Edit" class="btn btn-white btn-link btn-sm" data-original-title="Edit">
                                <i class="fas fa-edit"></i>
</a>
</td>
<td class="text-center">
{!! Form::open([
    'action' => ['PostController@destroy',$row->id],
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
