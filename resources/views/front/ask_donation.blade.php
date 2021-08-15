@extends('front.shared')
@section('content')
       <!--form-->
       <div class="form" >
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create Donation Request</li>
                        </ol>
                    </nav>
                </div>
                @include('flash::message')

                <div class="account-form">
                    <form method="POST" action="ask-donation">
                    {{csrf_field()}}
                    <input type="hidden" value="{{ auth("client_web")->id() }}" name="client_id">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="patient_name" placeholder="Patient Name">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email"  placeholder="E-mail">
                     
                        @inject('blood_types','App\Models\BloodType')
                            {!! Form::select('blood_type_id',$blood_types->pluck('name','id')->toArray(),null,[
                                'class' => 'form-control',
                                'placeholder' => 'blood types '

                            ]) !!}

                     
                            @inject('cities','App\Models\City')
                            {!! Form::select('city_id',$cities->pluck('name','id')->toArray(),null,[
                                'class' => 'form-control',
                             
                                'placeholder' => 'cities '

                            ]) !!}
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone number" name="patient_phone">
                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Hospital Name" name="hospital_name">
                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Hospital address" name="hospital_address">
                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Patient Age" name="patient_age">
                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Bages Num" name="bages_num">
                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="NOTES" name="notes">

                                     <div class="create-btn">
                            <input type="submit" value="Creat">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
      
      @endsection     