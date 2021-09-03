  

@extends('layout-frontend/app')
@extends('include-frontend.header')
@extends('include-frontend.footer')

 @section('seo_content')

@php
$dataseo=\App\Models\Settings::first();
@endphp
{!!$dataseo->livesearch_meta!!}
@endsection

@section('content')

  

    <!--============= Banner Section Starts Here =============-->

    <section class="banner-section-2 bg_img" data-background="{{asset('frontend/images/landing-hero-background.jpg')}}">

        <div class="container">


   

            <div class="row align-items-center justify-content-between align-items-center">

           

                <div class="col-lg-12 col-xl-12  d-lg-block">





    <!--============= Search Box Starts Here =============-->                




    

          @include('include-frontend.searchbox',$data=['live'=>false,'competitors'=>true,'buyer'=>false,'historical'=>false]);



    

                   

                </div>                

            </div>

        </div>

        <div class="banner-shape-2 d-none d-lg-block">

         {{--    <img src="{{asset('frontend/css/img/banner-shape-2.png')}}" alt="css"> --}}

        </div>

    </section>

    <!--============= Banner Section Ends Here =============-->





    <!--============= Upcoming Auction Section Starts Here =============-->

    <section class="upcoming-auction padding-bottom-searchpage">

  <!--       <div class="container">

            <div class="section-header">

                <h3 class="title">ALL CONTRACTS</h3>

           

            </div>

        </div> -->

        <div class="container">

            <div class="m--15">

              
                
                   {{--  @include('include-frontend.horizontal-card'); --}}
                
                   
             </div>

         </div>

        </div>

    </section>

    <!--============= Upcoming Auction Section Ends Here =============-->


@endsection

@section("footer")
@parent
 @include('include-frontend.searchDependency');

@endsection

