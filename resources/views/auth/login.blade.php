    
@extends('layout-frontend/app')
@extends('include-frontend.header')
@extends('include-frontend.footer')
@section('seo_content')

@php
$dataseo=\App\Models\Settings::first();
@endphp
{!!$dataseo->login_meta!!}
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


    <!--============= Dashboard Section Starts Here =============-->
    <section class="dashboard-section padding-bottom mt--240 mt-lg--325 pos-rel">
        <div class="container">
           <div class="account-wrapper mt--100 mt-lg--240">
                <div class="left-side">
                    <div class="section-header">
                        <h2 class="title">HI, THERE</h2>
                        <p>You can log in to your Contract Finder Pro account here.</p>
                    </div>
                   
                    <form class="login-form" novalidate="" action="{{ route('login') }}"  method="POST">
                        @csrf
                        <div class="form-group mb-30">
                            <label for="login-email"><i class="far fa-envelope"></i></label>
                            <input type="email" id="login-email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">

                                          
                        </div>
                         @error('email')
                                            <p class="text-white bg-danger shadow-lg rounded-lg text-center">{{ $message }}</p>
                                            @enderror
                        <div class="form-group">
                            <label for="login-pass"><i class="fas fa-lock"></i></label>
                            <input type="password" id="login-pass" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <span class="pass-type"><i class="fas fa-eye"></i></span>

                           
                             </div>
                               @error('password')
                                            <p class="text-white bg-danger shadow-lg rounded-lg text-center">{{ $message }}</p>
                                            @enderror
                              <div class="form-group">
                           <div class="custom-checkbox custom-control">
                              <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                              <label for="remember" class="custom-control-label">Remember Me</label>
                           </div>
                        </div>
                            <div class="form-group">
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="custom-button">LOG IN</button>
                        </div>
                    </form>
                </div>
                <div class="right-side cl-white">
                    <div class="section-header mb-0">
                        <h3 class="title mt-0">NEW HERE?</h3>
                        <p>Sign up and create your Account</p>
                        <a href="{{ route('register') }}" class="custom-button transparent">Sign Up</a>
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
    


</style>
<script type="text/javascript">
    
 jQuery(document).ready(function($) {


// $(".readmore").on('click touchstart', function(event) {
//         var txt = $(".more-content").is(':visible') ? 'Show more (+)' : 'Less (???)';
//         $(this).parent().prev(".more-content").toggleClass("cg-visible");
//         $(this).html(txt);
//         event.preventDefault();
//     }); 
      $(".show-more").click(function () {
        if($(this).siblings('.text').hasClass("show-more-height")) {
            $(this).text("(Show Less)");
        } else {
            $(this).text("(Show More)");
        }

        $(".text").toggleClass("show-more-height");
    });
  });
</script>

@endsection

   

















{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}