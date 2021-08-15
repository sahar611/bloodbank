@extends('front.shared')
@section('content')
       <!--form-->
       <div class="form" >
            <div class="container">
                <div class="path">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-ltr.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create new account</li>
                        </ol>
                    </nav>
                </div>
                @include('flash::message')

                <div class="account-form">
                    <form method="POST" action="store-client">
                    {{csrf_field()}}

                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="name">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email"  placeholder="E-mail">
                        <input placeholder="Birth date" class="form-control" type="text" onfocus="(this.type='date')" id="date" name="date_of_birth">
                     
                        @inject('blood_types','App\Models\BloodType')
                            {!! Form::select('blood_type_id',$blood_types->pluck('name','id')->toArray(),null,[
                                'class' => 'form-control',
                                'placeholder' => 'blood types '

                            ]) !!}

                        @inject('governorate','App\Models\Governorate')
                            {!! Form::select('governorate_id',$governorate->pluck('name','id')->toArray(),null,[
                                'class' => 'form-control',
                                'id' => 'governorates',
                                'placeholder' => 'governorates '

                            ]) !!}
                            {!! Form::select('city_id',[],null,[
                                'class' => 'form-control',
                                'id' => 'cities',
                                'placeholder' => 'city '
                            ]) !!}
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone number" name="phone">
                        <input placeholder="Last date for donation" class="form-control" type="text" onfocus="(this.type='date')" id="date" name="last_donation_date">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="confirm password" name="password_confirmation">
                        <div class="create-btn">
                            <input type="submit" value="Creat">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
      
        @push('scripts')
        <script>
            $("#governorates").change(function (e) {
                e.preventDefault();
                // get gov
                // send ajax
                // append cities
                var governorate_id = $("#governorates").val();
                if (governorate_id)
                {
                    $.ajax({
                        url : '{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
                        type: 'get',
                        success: function (data) {
                            if (data.status == 1)
                            {
                                $("#cities").empty();
                                $("#cities").append('<option value="">select city </option>');
                                $.each(data.data, function (index, city) {
                                    $("#cities").append('<option value="'+city.id+'">'+city.name+'</option>');
                                });
                            }
                        },
                        error: function (jqXhr, textStatus, errorMessage) { // error callback
                            alert(errorMessage);
                        }
                    });
                }else{
                    $("#cities").empty();
                    $("#cities").append('<option value="">selecy city </option>');
                }
            });
        </script>
    @endpush
      @endsection     