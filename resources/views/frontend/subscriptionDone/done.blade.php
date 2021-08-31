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
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('frontend/images/landing-hero-background.jpg')}}" style="background:url({{asset('frontend/images/landing-hero-background.jpg')}});"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->
  <!--============= Dashboard Section Starts Here =============-->
   <section class="upcoming-auction padding-bottom">
     
        
        <div class="container ">

         <div class="row justify-content-md-center">

            <div class="card-wrapper">

             

               <div class="card fat my-5">

                  <div class="card-body text-center align-middle">
                  <p class="font-weight-bolder">{{ $subemail }}</p>
                    <br><br> <h2 style="color:#0fad00">Success</h2>

        <img src="{{ asset('frontend/images/subsdone.png') }}"  width="150" height="150">

        <h2 class="mt-3"> Congratulations! You Have Become A Subscriber</h2>

       

        <a href="{{ route('login') }}" class="btn btn-success mt-3">     Log in      </a>

    <br><br>

                  </div>

               </div>

             

            </div>

         </div>

      </div>

   </section>



  @endsection
@section("footer")
@parent

  <style type="text/css">


.hero-section {
  
   padding: 190px 0 109px !important;

    }


    .custombackgroundauth{

    background-attachment: fixed;

    background-repeat: no-repeat;

    background-size: cover;

    }

      html,body {

    

   height: 100%;

}



body.my-login-page {

   background-color: #f7f9fb;

   font-size: 14px;

}



.my-login-page .brand {

   width: 90px;

   height: 90px;

   overflow: hidden;

   border-radius: 50%;

   margin: 40px auto;

   box-shadow: 0 4px 8px rgba(0,0,0,.05);

   position: relative;

   z-index: 1;

}



.my-login-page .brand img {

   width: 100%;

}



.my-login-page .card-wrapper {

   width: 50%;

}



.my-login-page .card {

   border-color: transparent;

   box-shadow: 0 4px 8px rgba(0,0,0,.05);

}



.my-login-page .card.fat {

   padding: 10px;

   background: #ffffff;

    opacity: 0.9;

}



.my-login-page .card .card-title {

   margin-bottom: 30px;

}



.my-login-page .form-control {

   border-width: 2.3px;

}



.my-login-page .form-group label {

   width: 100%;

}



.my-login-page .btn.btn-block {

   padding: 12px 10px;

}



.my-login-page .footer {

   margin: 40px 0;

   color: #888;

   text-align: center;

}



@media screen and (max-width: 425px) {

   .my-login-page .card-wrapper {

      width: 90%;

      margin: 0 auto;

   }

}



@media screen and (max-width: 320px) {

   .my-login-page .card.fat {

      padding: 0;

   }



   .my-login-page .card.fat .card-body {

      padding: 15px;

   }

}

   </style>

   @endsection

