<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <!--google fonts css-->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!--font awesome css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="icon" href="imgs/Icon.png">
        
        <!--owl-carousel css-->
        <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/assets/css/owl.theme.default.min.css')}}">
        
        <!--style css-->
        <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
        
        <!--override on style css-->
        <link rel="stylesheet" href="{{asset('front/assets/css/style-ltr.css')}}">
        
        <title>Blood Bank</title>
    </head>
    <body class="article-details">
        <!--upper-bar-->
        <div class="upper-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="language">
                            <a href="index-ltr.html" class="en active">EN</a>
                            <a href="index.html" class="ar inactive">عربى</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social">
                            <div class="icons">
                                <a target="_blank" href="{{$settings->fb_link}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="{{$settings->instgram_link}}" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a target="_blank" href="{{$settings->tw_link}}" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a target="_blank"  href="{{$settings->youtube_link}}" class="youtube"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- not a member-->
                    <!-- <div class="col-lg-4">
                        <div class="info" dir="ltr">
                            <div class="phone">
                                <i class="fas fa-phone-alt"></i>
                                <p>{{$settings->phone}}</p>
                            </div>
                            <div class="e-mail">
                                <i class="far fa-envelope"></i>
                                <p>{{$settings->email}}</p>
                            </div>
                        </div> -->
                        
                        <!--I'm a member

                        <div class="member">
                            <p class="welcome">مرحباً بك</p>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    احمد محمد
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="index-1.html">
                                        <i class="fas fa-home"></i>
                                        الرئيسية
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-user"></i>
                                        معلوماتى
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-bell"></i>
                                        اعدادات الاشعارات
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-heart"></i>
                                        المفضلة
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="far fa-comments"></i>
                                        ابلاغ
                                    </a>
                                    <a class="dropdown-item" href="contact-us.html">
                                        <i class="fas fa-phone-alt"></i>
                                        تواصل معنا
                                    </a>
                                    <a class="dropdown-item" href="index.html">
                                        <i class="fas fa-sign-out-alt"></i>
                                        تسجيل الخروج
                                    </a>
                                </div>
                            </div>
                        </div>

                        -->
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        <!--nav-->
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{asset('front/imgs/logo-ltr.png')}}" class="d-inline-block align-top" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/')}}">home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('page',1 )}}">about us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('articles')}}">articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('donations')}}">donation requests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('page',2 )}}">who are us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('contacts')}}">contact us</a>
                            </li>
                        </ul>
                        
                        <!--not a member-->
                        <div class="accounts">
                        @if (!auth("client_web")->user())

                            <a href="signin-account-rtl.html" class="signin">sign in</a>
                            <a href="{{url('client-register')}}" class="create">create new account</a>
                        </div>
                     
                    @else
                  
                        <a href="{{url('donation-request')}}" class="donate">
                            <img src="{{asset('front/imgs/transfusion.svg')}}">
                            <p>Ask Donations </p>
                        </a>

                     
                    @endif
                        <!--I'm a member

                        <a href="#" class="donate">
                            <img src="imgs/transfusion.svg">
                            <p>طلب تبرع</p>
                        </a>

                        -->
                        
                    </div>
                </div>
            </nav>
        </div>
        
        @yield('content')
        
        <!--footer-->
        <div class="footer">
            <div class="inside-footer">
                <div class="container">
                    <div class="row">
                        <div class="details col-md-4">
                            <img src="{{asset('front/imgs/logo-ltr.png')}}" class="d-inline-block align-top">
                            <h4>Blood Bank</h4>
                            <p>{{$settings->about_app	}}
                            </p>
                        </div>
                        <div class="pages col-md-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" href="index-ltr.html" role="tab" aria-controls="home">Home</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" href="#" role="tab" aria-controls="profile">About us</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" href="#" role="tab" aria-controls="messages">Articles</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="donation-requests-ltr.html" role="tab" aria-controls="settings">Donation requests</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="who-are-us-ltr.html" role="tab" aria-controls="settings">Who are us</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="contact-us-ltr.html" role="tab" aria-controls="settings">Contact us</a>
                            </div>
                        </div>
                        <div class="stores col-md-4">
                            <div class="availabe">
                                <p>Available on</p>
                                <a href="{{$settings->android_link	}}">
                                    <img src="{{asset('front/imgs/google1.png')}}">
                                </a>
                                <a href="{{$settings->ios_link	}}">
                                    <img src="{{asset('front/imgs/ios1.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="container">
                    <div class="row">
                        <div class="social col-md-4">
                            <div class="icons">
                                <a target="_blank" href="{{$settings->fb_link	}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a target="_blank" href="{{$settings->instgram_link	}}" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a target="_blank" href="{{$settings->tw_link	}}" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a target="_blank" href="{{$settings->phone_link	}}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                        <div class="rights col-md-8">
                            <p>All rights reserved to <span>Blood Bank</span> &copy; 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <script src="{{asset('front/assets/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>
      
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        
        <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
        
        <script src="{{asset('front/assets/js/main-ltr.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
        @stack('scripts')
    </body>
</html>