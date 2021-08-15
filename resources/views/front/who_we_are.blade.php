@extends('front.shared')
@section('content')

              <!--inside-article-->
        <div class="about-us">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$page->name}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="details">
                    <div class="logo">
                        <img src="{{asset('uploads/'.$page->image)}}">
                    </div>
                    <div class="text">
                        <p>
                           {{$page->body}}  </p>
                    </div>
                </div>
            </div>
        </div>
        
        
@endsection