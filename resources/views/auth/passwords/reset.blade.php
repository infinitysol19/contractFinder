
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
                       
                       
                    </div>


                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
      <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
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
//         var txt = $(".more-content").is(':visible') ? 'Show more (+)' : 'Less (–)';
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

   

















