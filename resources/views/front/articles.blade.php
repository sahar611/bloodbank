@extends('front.shared')
@section('content')
 <!--articles-->
 <div class="articles">
            <div class="container title">
                <div class="head-text">
                    <h2>Articles</h2>
                </div>
            </div>
            <div class="view">
                <div class="container">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            @foreach($posts as $post)
                            <div class="card">
                                <div class="photo">
                                    <img src="{{asset('uploads/'.$post->image)}}" class="card-img-top" alt="...">
                                    <a href="{{url('article', $post->id )}}" class="click">more</a>
                                </div>
                                <i id=" "></i>
                                

                                <div class="card-body">
                                    <h5 class="card-title">{{$post->name}}</h5>
                                    <p class="card-text">
                                            {{$post->body}}    </p>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection