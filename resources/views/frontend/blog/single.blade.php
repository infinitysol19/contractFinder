@extends('layout-frontend/app')
@extends('include-frontend.header')
@extends('include-frontend.footer')
@section('seo_content')
@php
$dataseo=\App\Models\Settings::first();
@endphp
{!!$dataseo->single_page_blog_meta!!}
@endsection
@section('content')
<!--============= Banner Section Starts Here =============-->
<section class="banner-section-2 bg_img" data-background="{{asset('frontend/images/landing-hero-background.jpg')}}">
    <div class="container">
        

          <h2 class="text-center text-white my-5">{{ $blog->title }}</h2>

    </div>
    <div class="banner-shape-2 d-none d-lg-block">
       {{--  <img src="{{asset('frontend/css/img/banner-shape-2.png')}}" alt="css"> --}}
    </div>
</section>
<!--============= Banner Section Ends Here =============-->
<!--============= Upcoming Auction Section Starts Here =============-->
<section class="upcoming-auction padding-bottom-searchpage">

    <div class="container">
   <div class="card mb-3">
 <img src="{{ asset('frontend/images/') }}/{{ $blog->featured_img }}" class="img-fluid img-thumbnail" style="max-height: 700px;" >

  <div class="card-body">
    <h5 class="card-title">{{ $blog->title }}</h5>
    <p class="card-text">{!! $blog->description !!}</p>
    <p class="card-text"><small class="text-muted">Created at: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->create_datetime)->format('d F, Y')}}</small></p>
  </div>
</div>

</div>
</section>
<!--============= Upcoming Auction Section Ends Here =============-->
@endsection