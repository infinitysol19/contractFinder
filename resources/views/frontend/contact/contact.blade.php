@extends('layout-frontend/app')
@extends('include-frontend.header')
@extends('include-frontend.footer')
@section('seo_content')

@php
$dataseo=\App\Models\Settings::first();
@endphp
{!!$dataseo->contact_meta!!}
@endsection
@section('content')
<!--============= Hero Section Starts Here =============-->
<div class="hero-section style-2 pb-lg-400">
    <div class="container">
        <div class="col-lg-12 col-xl-12 d-lg-block">
            <h2 class="text-center text-white mt-5">Contact Us</h2>
        </div>
    </div>
    <div class="bg_img hero-bg bottom_center" data-background="{{asset('frontend/images/landing-hero-background.jpg')}}" ></div>
</div>
<!--============= Hero Section Ends Here =============-->
<!--============= Dashboard Section Starts Here =============-->
<section class="dashboard-section padding-bottom mt--240 mt-lg--325 pos-rel">
    <div class="container">
        <div class="row  mt--100 mt-lg--280">
            <div class="col-11 col-sm-9 col-md-7 col-lg-8 col-xl-12  p-0 mt-3 mb-2">
                <div class="card px-2 p-md-5 p-sm-2  mt-3 mb-3 rounded shadow">
                    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible bg-danger">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- success message display --}}
@if(session('message'))
<div class="alert alert-success alert-dismissible bg-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> {{ session('message') }}
</div>
@endif
<div id="digital-clock"></div>
{{-- error message display if company added --}}
@if(session('error'))
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alert!</strong> {{ session('error') }}
</div>
@endif
 
                    <form   action="{{ route('postContactFront') }}" method="POST">
                        @csrf 

                       <input type="hidden" name="create_datetime" id="create_datetime" value="{{ date("Y-m-d H:i:s") }}">
                        <div class="row">
                        <div class="col-sm-6">
                               <div class="form-group">
                           <label for="name">Name</label>
                            <input id="name" type="text" class="form-control " name="name"   value="{{ old('name') }}" autocomplete="name" autofocus="" placeholder="johndoe123">

                                                        </div>
                        </div>
                        <div class="col-sm-6">
                               <div class="form-group">
                           <label for="email">Email</label>
                            <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" autocomplete="email" autofocus="" placeholder="johndoe123@gmail.com">

                                                        </div>
                        </div>
                        <div class="col-sm-6">
                               <div class="form-group">
                           <label for="email">Subject</label>
                            <input id="email" type="text" class="form-control " name="subject" value="{{ old('subject') }}"  autocomplete="subject" autofocus="" placeholder="e.g abc">

                                                        </div>
                        </div>
                        <div class="col-sm-6">
                               <div class="form-group">
                           <label for="email">Phone</label>
                            <input id="phone" type="text" class="form-control " name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus="" placeholder="+9234567078">

                                                        </div>
                        </div>

                          <div class="col-sm-12">
                          <textarea name="description" class="form-control" rows="5" >{{ old('description') }}</textarea>
                          </div>
                        </div>
                         
                               
                          <br>

                           <div class="checkbox">
      <label>
 <input
                                  
                                    type="checkbox"
                                    required="required"
                                    name="is_agree"

                                    value="yes"
                                />
      Accept Term & Coditions</label>
    </div>
                          


                                                        
                          
                        <br>
                        <button class="bg-primary text-white" type="submit" class="">Send message</button>
                    </form>
                 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->
    
    @endsection
    @section("footer")
    @parent
  
    @endsection