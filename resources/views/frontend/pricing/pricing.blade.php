    
@extends('layout-frontend/app')
@extends('include-frontend.header')
@extends('include-frontend.footer')
@section('seo_content')

@php
$dataseo=\App\Models\Settings::first();
@endphp
{!!$dataseo->pricing_meta!!}
@endsection
@section('content')

           <!--============= Hero Section Starts Here =============-->
   <div class="hero-section style-2 pb-lg-400">
        <div class="container">
          <div class="col-lg-12 col-xl-12 d-lg-block">
                 
               </div>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('frontend/images/landing-hero-background.jpg')}}" ></div>
    </div>
    <!--============= Hero Section Ends Here =============-->
<div class="banner-shape-2 d-none d-lg-block">

         {{--    <img src="{{asset('frontend/css/img/banner-shape-2.png')}}" alt="css"> --}}

        </div>

    <!--============= Dashboard Section Starts Here =============-->
   <section class="upcoming-auction padding-bottom">
     
        
        <div class="container mt--5">
            <div>
                <div class="auction-wrapper-5 pricingtable" style="position: relative; height: 0px;">
                    <div class=" ">

                        <div class="">
                        <div class="row m-auto text-center w-100">
                                        @php
                                        $allPackages=App\Models\package::all();
                                        @endphp
                                        @foreach ($allPackages as $allPackage)
                                        
                                        @if ($allPackage->id==1)
                                        {{-- expr --}}
                                        
                                        
                                        <div class="col-md-6 col-lg-4 col-sm-12 mb-4 princing-item red">
                                            <div class="pricing-divider ">
                                                <h3 class="text-light">{{ $allPackage->name }}</h3>
                                                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">£</span>{{ $allPackage->price }}<span class="h5">/month</span></h4>
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
                                                <ul class="list-unstyled mb-5 position-relative list-group list-group-flush" >
                                                    
                                                    @foreach (json_decode($allPackage->permission_slug) as $element)
                                                    <li class="text-capitalize list-group-item">{{ str_replace('_', ' ', $element); }}</li>
                                                    @endforeach
                                                </ul>
                                                
                                                
                                             
                                                
                                                <a href="{{ route('register') }}"  class="btn btn-danger btn-block chooosePackage" packge-price="{{ $allPackage->price}}" package-name="{{ $allPackage->name}}"
                                                package-id="{{ $allPackage->id}}"
                                                >Sign Up</a>
                                            </div>
                                        </div>
                                        @endif
                                        @if ($allPackage->id==2)
                                        <div class="col-md-6 col-lg-4 col-sm-12 mb-4 princing-item blue">
                                            <div class="pricing-divider ">
                                                <h3 class="text-light">{{ $allPackage->name }}</h3>
                                                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">£</span> {{ $allPackage->price }} <span class="h5">/month</span></h4>
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
                                                <ul class="list-unstyled mb-5 position-relative list-group list-group-flush" >
                                                    @foreach (json_decode($allPackage->permission_slug) as $element)
                                                    <li class="text-capitalize list-group-item">{{ str_replace('_', ' ', $element); }}</li>
                                                    @endforeach
                                                </ul>
                                                <div class="row justify-content-center mb-2 selectedpackage" style="display:none;">
                                                    <h5 class="text-success">Selected !</h5>
                                                    <div class="col-3"> <img src="{{ asset('frontend/images/GwStPmg.png') }}" class="fit-image"> </div>
                                                </div>
                                               <a href="{{ route('register') }}"  class="btn btn-info btn-block chooosePackage" packge-price="{{ $allPackage->price}}" package-name="{{ $allPackage->name}}"
                                                package-id="{{ $allPackage->id}}"
                                                >Sign Up</a>
                                            </div>
                                        </div>
                                        
                                        @endif
                                        @if ($allPackage->id==3)
                                        <div class="col-md-6 col-lg-4 col-sm-12 mb-4 princing-item green">
                                            <div class="pricing-divider ">
                                                <h3 class="text-light">{{ $allPackage->name }}</h3>
                                                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">£</span>{{ $allPackage->price }} <span class="h5">/month</span></h4>
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
                                                <ul class="list-unstyled mb-5 position-relative list-group list-group-flush">
                                                    @foreach (json_decode($allPackage->permission_slug) as $element)
                                                    <li class="text-capitalize list-group-item">{{ str_replace('_', ' ', $element); }}</li>
                                                    @endforeach
                                                </ul>
                                                <div class="row justify-content-center mb-2 selectedpackage" style="display:none;">
                                                    <h5 class="text-success">Selected !</h5>
                                                    <div class="col-3"> <img src="{{ asset('frontend/images/GwStPmg.png') }}" class="fit-image"> </div>
                                                </div>
                                                <a href="{{ route('register') }}"  class="btn btn-success btn-block chooosePackage" packge-price="{{ $allPackage->price}}" package-name="{{ $allPackage->name}}"
                                                package-id="{{ $allPackage->id}}"
                                                >Sign Up</a>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                    </div>
                </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->

   
@endsection
@section("footer")
@parent

{{-- <style type="text/css">
    
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

</style> --}}


@endsection

   
















