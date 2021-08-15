@extends('front.shared')
@section('content')

            <!--contact-us-->
        <div class="contact-now">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                        </ol>
                    </nav>
                </div>
                <div class="row methods">
                    <div class="col-md-6">
                        <div class="call">
                            <div class="title">
                                <h4>Contact us</h4>
                            </div>
                            <div class="content">
                                <div class="logo">
                                    <img src="{{asset('front/imgs/logo-ltr.png')}}">
                                </div>
                                <div class="details">
                                    <ul>
                                        <li><span>Telephone nomber:</span> {{$settings->phone}}</li>
                                        <!-- <li><span>Fax:</span> 234234234</li> -->
                                        <li><span>E-mail:</span>{{$settings->email}}</li>
                                    </ul>
                                </div>
                                <div class="social">
                                    <h4>Contact us</h4>
                                    <div class="icons" dir="ltr">
                                        <div class="out-icon">
                                            <a target="_blank" href="{{$settings->fb_link}}"><img src="{{asset('front/imgs/001-facebook.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a target="_blank" href="{{$settings->tw_link}}"><img src="{{asset('front/imgs/002-twitter.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a target="_blank" href="{{$settings->youtube_link}}"><img src="{{asset('front/imgs/003-youtube.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a target="_blank" href="{{$settings->instagram_link}}"><img src="{{asset('front/imgs/004-instagram.svg')}}"></a>
                                        </div>
                                        <div class="out-icon">
                                            <a target="_blank" href="{{$settings->phone}}"><img src="{{asset('front/imgs/005-whatsapp.svg')}}"></a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div class="title">
                                <h4>Connect with us</h4>
                            </div>
                            <div class="fields">
                            @include('flash::message')

                                <form method="post" action="store-contact">
                                {{csrf_field()}}

                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name" required="required">
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail" name="email" required="required">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Telephone number" name="phone" required="required">
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Message title" name="subject" required="required">
                                    <textarea placeholder="Text message" class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                    <button type="submit">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
@endsection