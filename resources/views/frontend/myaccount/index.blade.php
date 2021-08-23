    
@extends('layout-frontend/app')
@extends('include-frontend.header')
@extends('include-frontend.footer')

@section('content')

           <!--============= Hero Section Starts Here =============-->
   <div class="hero-section style-2 pb-lg-400">
        <div class="container">
          
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{ asset('frontend/images/banner/hero-bg.png') }}" style="background:url({{ asset('frontend/images/banner/hero-bg.png') }});"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Dashboard Section Starts Here =============-->
    <section class="dashboard-section padding-bottom mt--240 mt-lg--325 pos-rel">
        <div class="container">
            <div class="row">

                 <div class="col-lg-4">
                    <div class="dashboard-widget mb-30 mb-lg-0">
                        <div class="user">
                            <div class="thumb-area">
                                <div class="thumb">
                                    <img src="{{ asset('frontend/images/dashboard/user.png') }}" alt="user">
                                </div>
                                <label for="profile-pic" class="profile-pic-edit"><i class="flaticon-pencil"></i></label>
                                <input type="file" id="profile-pic" class="d-none">
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#0">Percy Reed</a></h5>
                                <span class="username">john@gmail.com</span>
                            </div>
                        </div>
                        <ul class="dashboard-menu">
                            <li>
                                <a href="#0" class="active"><i class="flaticon-dashboard"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="profile.html"><i class="flaticon-settings"></i>Personal Profile </a>
                            </li>
                            <li>
                                <a href="my-bid.html"><i class="flaticon-auction"></i>My Bids</a>
                            </li>
                            <li>
                                <a href="winning-bids.html"><i class="flaticon-best-seller"></i>Winning Bids</a>
                            </li>
                            <li>
                                <a href="notifications.html"><i class="flaticon-alarm"></i>My Alerts</a>
                            </li>
                            <li>
                                <a href="my-favorites.html"><i class="flaticon-star"></i>My Favorites</a>
                            </li>
                            <li>
                                <a href="referral.html"><i class="flaticon-shake-hand"></i>Referrals</a>
                            </li>
                        </ul>
                    </div>
                </div>
               @include('frontend.myaccount.profile')
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

   