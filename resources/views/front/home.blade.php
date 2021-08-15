@extends('front.shared')
@section('content')
    <!--intro-->
    <div class="intro">
            <div id="slider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                    <li data-target="#slider" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item carousel-1 active">
                        <div class="container info">
                            <div class="col-lg-5">
                                <h3>Blood bank moving forward to better health</h3>
                                <p>
                                    There is a proven fact from a long time ago that the readable content of a page will not distract the reader from focusing on the. 
                                </p>
                                <a href="#">more</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item carousel-2">
                        <div class="container info">
                            <div class="col-lg-5">
                                <h3>Blood bank moving forward to better health</h3>
                                <p>
                                    There is a proven fact from a long time ago that the readable content of a page will not distract the reader from focusing on the. 
                                </p>
                                <a href="#">more</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item carousel-3">
                        <div class="container info">
                            <div class="col-lg-5">
                                <h3>Blood bank moving forward to better health</h3>
                                <p>
                                    {{$settings->about_app}}
                                </p>
                                <a href="#">more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--about-->
        <div class="about">
            <div class="container">
                <div class="col-lg-6 text-center">
                    <p>
                        <span>Blood Bank</span>{{$settings->about_app}}
                    </p>
                </div>
            </div>
        </div>
        
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
                        <div class="articles-carousel">
                            @foreach($posts as $post)
                            <div class="card">
                                <div class="photo">
                                    <img src="{{asset('uploads/'.$post->image)}}" class="card-img-top" alt="...">
                                    <a href="article-details-ltr.html" class="click">more</a>
                                </div>
                                <i id="{{$post->id}}" onclick="toggleFavourite(this)" class="fab fa-gratipay
{{$post->is_favourite ? 'second-heart' : 'first-heart'}}
"></i>
                                
                         
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
        
        <!--requests-->
        <div class="requests">
            <div class="container">
                <div class="head-text">
                    <h2>Donation requests</h2>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <form class="row filter" method="GET" action="{{url('search-donation')}}">
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1" name="blood_type">
                                        <option selected disabled>Choose blood type</option>
                                        @foreach($blood_types as $blood_type)
                                        <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                                        @endforeach
                                     
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="exampleFormControlSelect1" name="city">
                                        <option selected disabled>Choose city</option>
                                        @foreach($city as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                 

                    <div class="patients">  
                         @foreach($donations as $donation)
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">{{$donation->BloodType->name}}</h2>
                            </div>
                            <ul>
                                <li><span>Patient name:</span> {{$donation->patient_name}}</li>
                                <li><span>Hospital:</span>{{$donation->	hospital_name}}</li>
                                <li><span>City:</span> {{$donation->hospital_address}}</li>
                            </ul>
                            <a href="inside-request-ltr.html">Details</a>
                        </div>
                        @endforeach
                    </div>
                    <div class="more">
                        <a href="donation-requests-ltr.html">More</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!--contact-->
        <div class="contact">
            <div class="container">
                <div class="col-md-7">
                    <div class="title">
                        <h3>Contact us</h3>
                    </div>
                    <p class="text"> {{$settings->contact_text	}}</p>
                    <div class="row whatsapp">
                        <a href="tel:{{$settings->phone	}}">
                            <img src="{{asset('front/imgs/whats.png')}}">
                            <p dir="ltr">{{$settings->phone	}}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!--app-->
        <div class="app">
            <div class="container">
                <div class="row">
                    <div class="info col-md-6">
                        <h3>Blood bank app</h3>
                        <p>
                            {{$settings->notification_text	}}
                        </p>
                        <div class="download">
                            <h4>Available on</h4>
                            <div class="row stores">
                                <div class="col-sm-6">
                                    <a href=" {{$settings->android_link	}}">
                                        <img src="{{asset('front/imgs/google.png')}}">
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href=" {{$settings->ios_link	}}">
                                        <img src="{{asset('front/imgs/ios.png')}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="screens col-md-6">
                        <img src="{{asset('front/imgs/App.png')}}">
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
            function toggleFavourite(heart) {
                var post_id = heart.id;
                $.ajax({
                    url : '{{url(route('toggle-favourite'))}}',
                    type: 'post',
                    data: {_token:"{{csrf_token()}}",post_id:post_id},
                    success: function (data) {
                        if (data.status == 1)
                        {
                            console.log(data);
                            var currentClass = $(heart).attr('class');
                            if (currentClass.includes('first')) {
                                $(heart).removeClass('first-heart').addClass('second-heart');
                            } else {
                                $(heart).removeClass('second-heart').addClass('first-heart');
                            }
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) { // error callback
                        // alert(errorMessage);
                    }
                });
            }
        </script>
    @endpush  
        @endsection
       