


@extends('front.shared')
@section('content')
   <!--inside-article-->
   <div class="inside-article">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{url('articles')}}">Articles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$post->name}}</li>
                        </ol>
                    </nav>
                </div>

                <div class="article-image">
                    <img src="{{asset('uploads/'.$post->image)}}">
                </div>
                <div class="article-title col-12">
                    <div class="h-text col-6">
                        <h4>   {{$post->name}} </h4>
                    </div>
                    <div class="icon col-6">
                        <button type="button"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                
                <!--text-->
                <div class="text">
                    <p>
                        {{$post->body}}   </p>
                </div>

                <!--articles-->
                <div class="articles">
                    <div class="title">
                        <div class="head-text">
                            <h2>Related articles</h2>
                        </div>
                    </div>
                    <div class="view">
                        <div class="row">
                            <!-- Set up your HTML -->
                            <div class="owl-carousel articles-carousel">
                                @foreach($posts as $post)

                                <div class="card">
                                    <div class="photo">
                                        <img src="{{asset('uploads/'.$post->image)}}" class="card-img-top" alt="...">
                                        <a href="{{url('article', $post->id )}}" class="click">more</a>
                                    </div>
                                    <a href="{{url('article', $post->id )}}" class="favourite">
                                        <i class="far fa-heart"></i>
                                    </a>
                                    
                                    <div class="card-body">
                                        <h5 class="card-title"> {{$post->name}} </h5>
                                        <p class="card-text">
                                            {{$post->body}} 
                                        </p>
                                    </div>
                                </div>
                                @endforeach

                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
@endsection