@extends('front.shared')
@section('content')
  <!--inside-article-->
  <div class="all-requests">
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Donation requests</li>
                        </ol>
                    </nav>
                </div>
            
                <!--requests-->
                <div class="requests">
                    <div class="head-text">
                        <h2>Donation requests</h2>
                    </div>
                    <div class="content">
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
                                    <h2>{{$donation->BloodType->name}}</h2>
                                </div>
                                <ul>
                                    <li><span>Patient name:</span> {{$donation->patient_name}}</li>
                                    <li><span>Hospital:</span>{{$donation->	hospital_name}}</li>
                                    <li><span>City:</span> {{$donation->hospital_address}}</li>
                                </ul>
                                <a href="{{url('donation', $donation->id )}}">Details</a>
                            </div>
                        @endforeach
                        </div>
                        <div class="pages">
                            <nav aria-label="Page navigation example">
                             {{$donations}}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
@endsection