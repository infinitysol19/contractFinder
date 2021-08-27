@extends('layout-frontend/app')
@extends('include-frontend.header')
@extends('include-frontend.footer')
@section('content')
<!--============= Hero Section Starts Here =============-->
<div class="hero-section style-2 pb-lg-400">
    <div class="container">
        <div class="col-lg-12 col-xl-12 d-lg-block">
            
        </div>
    </div>
    <div class="bg_img hero-bg bottom_center" data-background="{{ asset('frontend/images/banner/hero-bg.png') }}" style="background:url({{ asset('frontend/images/banner/hero-bg.png') }});"></div>
</div>
<!--============= Hero Section Ends Here =============-->
<!--============= Dashboard Section Starts Here =============-->
<section class="dashboard-section padding-bottom mt--240 mt-lg--325 pos-rel">
    <div class="container">
        <div class="row justify-content-center mt--100 mt-lg--280">
            <div class="col-11 col-sm-9 col-md-7 col-lg-8 col-xl-12 text-center p-0 mt-3 mb-2">
                <div class="card px-2 p-md-5 p-sm-2  mt-3 mb-3 rounded shadow">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form id="msform"  role="form"  method="post" class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="pk_test_voEdyVqhHtKi93KlIwdfogH100LXcVgeza">
                        @csrf 
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Account</strong></li>
                            <li id="personal"><strong>Personal</strong></li>
                            <li id="payment"><strong>Payment</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            <fieldset>
                                
                                <div class="form-card text-center">
                                    <div class="row">
                                        <div class="col-7">
                                            {{--  <h2 class="fs-title">Account Information:</h2> --}}
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 1 - 4</h2>
                                        </div>
                                    </div>
                                    <h3 id="heading" class="mb-5">Sign Up Your User Account</h3>
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            @error('email')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            
                                            <input type="email" name="email" placeholder="Email"  class='rounded-lg shadow-lg' value="{{ old('email') }}" required/>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            @error('first_name')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="first_name" placeholder="First Name" class='rounded-lg shadow-lg' value="{{ old('first_name') }}"/>
                                        </div>
                                        <div class="col-sm-6">
                                            @error('last_name')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="last_name" placeholder="Last Name" class='rounded-lg shadow-lg' value="{{ old('last_name') }}"/>
                                        </div>
                                        <div class="col-sm-6">
                                            @error('phone_number')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="phone_number" placeholder="Phone Number" class='rounded-lg shadow-lg' value="{{ old('phone_number') }}"/ >
                                        </div>
                                        <div class="col-sm-6">
                                            @error('password')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            <input type="password" name="password" placeholder="Password" class='rounded-lg shadow-lg' value="{{ old('password') }}" />
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class='rounded-lg shadow-lg' />
                                        </div>
                                    </div>
                                    
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                
                                <div class="form-card text-center">
                                    <div class="row">
                                        <div class="col-7">
                                            {{--  <h2 class="fs-title">Personal Information:</h2> --}}
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 2 - 4</h2>
                                        </div>
                                    </div>
                                    <h3 id="heading" class="mb-5">Help us understand your business
                                    </h3>
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            @error('company')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="company" placeholder="Company Name" class='rounded-lg shadow-lg' value="{{ old('company') }}"/ >
                                        </div>
                                        <div class="col-sm-6">
                                            @error('industry_sector')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="industry_sector" placeholder="Industry Sector" class='rounded-lg shadow-lg' value="{{ old('industry_sector') }}"/ >
                                        </div>
                                        <div class="col-sm-6">
                                            @error('number_of_employees')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            
                                            <select name="number_of_employees" class="rounded-lg shadow-lg form-control number_of_employees" >
                                                
                                                <option value="">Select Number Of Employees</option>
                                                <option value="1-4">1-4</option>
                                                <option value="5-19">5-19</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            @error('turnover')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            
                                            <select name="turnover" class="rounded-lg shadow-lg form-control turnover" >
                                                
                                                <option value="">Please Select Turnover</option>
                                                <option value="£0K-£49K">£0K - £49K</option>
                                                <option value="£50K-£99K">£50K - £99K</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 mt-3 offset-3">
                                            @error('company_post_code')
                                            <p class="text-white bg-danger shadow-lg rounded-lg">{{ $message }}</p>
                                            @enderror
                                            <input type="text" name="company_post_code" placeholder="Company Post Code" class='rounded-lg shadow-lg' value="{{ old('company_post_code') }}"/ >
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card text-center">
                                    <div class="row">
                                        <div class="col-7">
                                            
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 3 - 4</h2>
                                        </div>
                                    </div>
                                    
                                    <div class="row m-auto text-center w-100">
                                        @php
                                        $allPackages=App\Models\package::all();
                                        @endphp
                                        @foreach ($allPackages as $allPackage)
                                        
                                        @if ($allPackage->name=='Basic')
                                        {{-- expr --}}
                                        
                                        
                                        <div class="col-md-6 col-lg-4 col-sm-12 mb-4 princing-item red">
                                            <div class="pricing-divider ">
                                                <h3 class="text-light">{{ $allPackage->name }}</h3>
                                                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span>{{ $allPackage->price }}<span class="h5">/month</span></h4>
                                                <svg class="pricing-divider-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                                    <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
                                                    c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                                    <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
                                                    c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                                    <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
                                                    H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                                    <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
                                                    c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                                </svg>
                                            </div>
                                            <div class="card-body bg-white mt-0 shadow">
                                                <ul class="list-unstyled mb-5 position-relative list-group list-group-flush" style="height:250px;">
                                                    
                                                    @foreach (json_decode($allPackage->permission_slug) as $element)
                                                    <li class="text-capitalize list-group-item">{{ str_replace('_', ' ', $element); }}</li>
                                                    @endforeach
                                                </ul>
                                                
                                                
                                                <div class="row justify-content-center mb-2 selectedpackage">
                                                    <h5 class="text-success">Selected !</h5>
                                                    <div class="col-3"> <img src="{{ asset('frontend/images/GwStPmg.png') }}" class="fit-image"> </div>
                                                </div>
                                                
                                                <button type="button" class="btn btn-danger btn-block chooosePackage" packge-price="{{ $allPackage->price}}" package-name="{{ $allPackage->name}}"
                                                package-id="{{ $allPackage->id}}"
                                                >For Select Click Here</button>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($allPackage->name=='Standard')
                                        <div class="col-md-6 col-lg-4 col-sm-12 mb-4 princing-item blue">
                                            <div class="pricing-divider ">
                                                <h3 class="text-light">{{ $allPackage->name }}</h3>
                                                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span> {{ $allPackage->price }} <span class="h5">/month</span></h4>
                                                <svg class="pricing-divider-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                                    <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
                                                    c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                                    <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
                                                    c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                                    <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
                                                    H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                                    <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
                                                    c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                                </svg>
                                            </div>
                                            <div class="card-body bg-white mt-0 shadow">
                                                <ul class="list-unstyled mb-5 position-relative list-group list-group-flush" style="height: 300px;overflow-y: scroll;">
                                                    @foreach (json_decode($allPackage->permission_slug) as $element)
                                                    <li class="text-capitalize list-group-item">{{ str_replace('_', ' ', $element); }}</li>
                                                    @endforeach
                                                </ul>
                                                <div class="row justify-content-center mb-2 selectedpackage" style="display:none;">
                                                    <h5 class="text-success">Selected !</h5>
                                                    <div class="col-3"> <img src="{{ asset('frontend/images/GwStPmg.png') }}" class="fit-image"> </div>
                                                </div>
                                                <button type="button" class="btn btn-info btn-block chooosePackage" packge-price="{{$allPackage->price}}" package-name="{{ $allPackage->name}}"
                                                package-id="{{ $allPackage->id}}"
                                                >For Select Click Here</button>
                                            </div>
                                        </div>
                                        
                                        @endif
                                        @if ($allPackage->name=='Premium')
                                        <div class="col-md-6 col-lg-4 col-sm-12 mb-4 princing-item green">
                                            <div class="pricing-divider ">
                                                <h3 class="text-light">{{ $allPackage->name }}</h3>
                                                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span>{{ $allPackage->price }} <span class="h5">/month</span></h4>
                                                <svg class="pricing-divider-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                                    <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729
                                                    c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                                    <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729
                                                    c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                                    <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716
                                                    H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                                    <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428
                                                    c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                                                </svg>
                                            </div>
                                            <div class="card-body bg-white mt-0 shadow">
                                                <ul class="list-unstyled mb-5 position-relative list-group list-group-flush" style="height: 300px;overflow-y: scroll;">
                                                    @foreach (json_decode($allPackage->permission_slug) as $element)
                                                    <li class="text-capitalize list-group-item">{{ str_replace('_', ' ', $element); }}</li>
                                                    @endforeach
                                                </ul>
                                                <div class="row justify-content-center mb-2 selectedpackage" style="display:none;">
                                                    <h5 class="text-success">Selected !</h5>
                                                    <div class="col-3"> <img src="{{ asset('frontend/images/GwStPmg.png') }}" class="fit-image"> </div>
                                                </div>
                                                <button type="button" class="btn btn-success btn-block chooosePackage" packge-price="{{ $allPackage->price}}" package-name="{{ $allPackage->name}}"
                                                
                                                package-id="{{ $allPackage->id}}"
                                                >For Select Click Here</button>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="row showhidepayment"  style="display:none;">
                                        <div class="col-md-12 ">
                                            <div class="panel panel-default credit-card-box">
                                                <div class="panel-heading display-table" >
                                                    <div class="row " >
                                                        
                                                        <div class="" >
                                                            <img class="img-responsive pull-right img-fluid" src="{{ asset('/frontend/images/291-2918799_stripe-payment-icon-png-transparent-png-removebg-preview.png') }}" width="300">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    
                                                    
                                                    
                                                    <input type="hidden" name="package_id" id="package_id" value="1">
                                                    <input type="hidden" name="package_price" id="package_price" value="0">
                                                    <input type="hidden" name="package_name" id="package_name" value="Basic">
                                                    
                                                    <div class='form-row row'>
                                                        <div class='col-sm-12 form-group required'>
                                                            <label class='control-label'>Name on Card</label> <input
                                                            class='form-control rounded-lg shadow-lg' size='4' type='text'>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class='form-row row'>
                                                        <div class='col-sm-12 form-group card required'>
                                                            <label class='control-label'>Card Number</label> <input
                                                            autocomplete='off' class='form-control card-number rounded-lg shadow-lg' size='20'
                                                            type='text'>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class='form-row row'>
                                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                                            class='form-control card-cvc rounded-lg shadow-lg' placeholder='ex. 311' size='4'
                                                            type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                            <label class='control-label'>Expiration Month</label> <input
                                                            class='form-control card-expiry-month rounded-lg shadow-lg' placeholder='MM' size='2'
                                                            type='text'>
                                                        </div>
                                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                            <label class='control-label'>Expiration Year</label> <input
                                                            class='form-control card-expiry-year rounded-lg shadow-lg' placeholder='YYYY' size='4'
                                                            type='text'>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="customAlertpack alert alert-success bg-success text-white font-weight-bold shadow-lg border-0">Package: Basic</div>
                              
                                <div class="loader" style="position: relative;
    right: 50%;
    left: 50%; display:none;"></div>
                                <div class="customAlert alert alert-danger bg-danger text-white shadow-lg border-0" style="display:none"></div>
                                <input type="button" name="next" class="action-button registerClick" value="Submit" />

                                
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset class="conflast">
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 4 - 4</h2>
                                        </div>
                                    </div> <br><br>
                                    <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="{{ asset('frontend/images/GwStPmg.png') }}" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
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
    <style type="text/css">
    .panel-title {
    display: inline;
    font-weight: bold;
    }
    .display-table {
    display: table;
    }
    .display-tr {
    display: table-row;
    }
    .display-td {
    display: table-cell;
    vertical-align: middle;
    width: 61%;
    }
    /* width */
    ::-webkit-scrollbar {
    width: 5px;
    }
    /* Track */
    ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: red;
    border-radius: 10px;
    }
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #b30000;
    }
    .rounded-lg {
    border-radius: 3.3rem!important;
    }
    .choices__inner {
    display: inline-block;
    vertical-align: top;
    width: 100%;
    background-color: #f9f9f9;
    padding: 7.5px 7.5px 3.75px;
    border: 1px solid #DDDDDD;
    border-radius: 48.5px;
    }
    .customAlert p{
    color:white !important;
    }
    </style>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {


    $('.chooosePackage').click(function (e) {
    e.preventDefault();
     
    $("#package_id").val($(this).attr('package-id'));
    $("#package_price").val($(this).attr('packge-price'));
    $("#package_name").val($(this).attr('package-name'));

    $('.selectedpackage').hide();

    $(this).siblings('.selectedpackage').show();

    $('.customAlertpack').text('Package: '+$(this).attr('package-name'));

    if($(this).attr('package-id')!='1'){
   
    $('.showhidepayment').show();
    }else{
$('.showhidepayment').hide();
    }

    });
    function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
    c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
    return c.substring(name.length, c.length);
    }
    }
    return "";
    }
    function isEmpty(str) {
    return (!str || str.length === 0 );
    }
    $('.registerClick').click(function (e) {

    $('.loader').show();
    e.preventDefault();
    let email=$("input[name=email]").val();
    let first_name=$("input[name=first_name]").val();
    let last_name=$("input[name=last_name]").val();
    let phone_number=$("input[name=phone_number]").val();
    let password=$("input[name=password]").val();
    let password_confirmation=$("input[name=password_confirmation]").val();
    let company=$("input[name=company]").val();
    let industry_sector=$("input[name=industry_sector]").val();
    let company_post_code=$("input[name=company_post_code]").val();
    let number_of_employees=$(".number_of_employees").val();
    let turnover=$(".turnover").val();
    let package_id=$("#package_id").val();
    let package_price=$("#package_price").val();
    let package_name=$("#package_name").val();
    let card_number=$(".card-number").val();
    let card_cvc=$(".card-cvc").val();
    let card_expiry_month=$(".card-expiry-month").val();
    let card_expiry_year=$(".card-expiry-year").val();
    $.ajax({
    url:"{{ route('customize_register') }}",
    type:"POST",
    dataType:"json",
    data:{email:email,
    first_name:first_name,
    last_name:last_name,
    phone_number:phone_number,
    password:password,
    password_confirmation:password_confirmation,
    company:company,
    industry_sector:industry_sector,
    company_post_code:company_post_code,
    number_of_employees:number_of_employees,
    turnover:turnover,
    package_id:package_id,
    package_name:package_name,
    package_price:package_price,
    card_number:card_number,
    card_cvc:card_cvc,
    card_expiry_month:card_expiry_month,
    card_expiry_year:card_expiry_year,
    _token:"{{ csrf_token() }}"},
    success:function(res)
    {
   $('.loader').hide();
        console.log(res);
    if(res.status=='fail'){

   $('.customAlert').show();
    if(res.error){

        var temp2=`<p>${res.error}</p>`;
     $('.customAlert').html(temp2);

  
    }else{

    var temp='';
    $.each(res.errors, function(key, value){
    
    temp+=`<p>${value}</p>`;
    });
    $('.customAlert').html(temp);
}
    }else{



$('.progress-bar').css({'width':'100%'});
$('#confirm').addClass('active');
$('fieldset').hide();
$('.conflast').show();
 
       var delayt = 2000; 
        var urlre =res.redirect
        setTimeout(function(){ window.location.href = urlre; }, delayt);
        
    }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        $('.loader').hide();
    console.log("Status: " + textStatus); console.log("Error: " + errorThrown);console.log("Error: " + errorThrown);
    }
    });
    });
    });


   
    </script>
    @endsection