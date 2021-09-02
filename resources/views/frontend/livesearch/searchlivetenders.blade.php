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

<section class="banner-section-2 bg_img" data-background="{{asset('frontend/images/landing-hero-background.jpg')}}">
    <div class="container">
        <div class="row align-items-center justify-content-between align-items-center">
            <div class="col-lg-12 col-xl-12  d-lg-block">
                @include('include-frontend.searchbox');
            </div>
        </div>
    </div>
  
</section>
<section class="upcoming-auction padding-bottom-searchpage">
    <div class="container">
        <div class="m--15" id="Show_Card_Tender_data">
            
            
            @include('include-frontend.horizontal-card');
            
            
        </div>


       
        
    </div>

</section>
<!--============= Upcoming Auction Section Ends Here =============-->
@endsection
@section("footer")
@parent
@include('include-frontend.searchDependency');
@endsection