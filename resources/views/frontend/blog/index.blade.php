@extends('layout-frontend/app')
@extends('include-frontend.header')
@extends('include-frontend.footer')
@section('seo_content')
@php
$dataseo=\App\Models\Settings::first();
@endphp
{!!$dataseo->blog_meta!!}
@endsection 
@section('content')
<!--============= Banner Section Starts Here =============-->
<section class="banner-section-2 bg_img" data-background="{{asset('frontend/images/landing-hero-background.jpg')}}">
    <div class="container">
        

          <h2 class="text-center text-white my-5">Blog</h12>

    </div>
    <div class="banner-shape-2 d-none d-lg-block">
      {{--   <img src="{{asset('frontend/css/img/banner-shape-2.png')}}" alt="css"> --}}
    </div>
</section>
<!--============= Banner Section Ends Here =============-->
<!--============= Upcoming Auction Section Starts Here =============-->
<section class="upcoming-auction padding-bottom-searchpage">
    <div class="container">
    <div class="m--15">
        
        @foreach ($blogs as $element)
        {{-- expr --}}
        
        <div class="card mb-3" style="border-radius: 10px;
            background-color: white;
            box-shadow: 0px 9px 20px 0px rgb(22 26 57 / 36%);">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset('frontend/images/') }}/{{ $element->featured_img }}" style="border-radius: 12px 0px 0px 11px;" class="img-fluid img-thumbnail">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{  $element->title }}</h5>
                        <p class="card-text">
                            {!!  Str::limit($element->description, 600)  !!}
                        </p>
                        <a href="{{ route('blogsingle',['slug'=>$element->slug]) }}" class="btn btn-primary btn-sm shadow-lg border-0 my-3" style="background:#693FF5;">Read More</a>
                        <p class="card-text"><small class="text-muted">Created at: {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $element->create_datetime)->format('d F, Y')}}</small></p>
                    </div>
                </div>
            </div>
        </div>
        
        @endforeach
        
    </div>
    {{  $blogs->links('pagination::bootstrap-4') }}
    
    </div>
</section>
<!--============= Upcoming Auction Section Ends Here =============-->
@endsection