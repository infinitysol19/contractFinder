    
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
                                <a href="{{ route('dashboard') }}" class="active dashboard"><i class="flaticon-dashboard"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('profile') }}" class="profile"><i class="flaticon-settings"></i>Personal Profile </a>
                            </li>

                             <li>
                                <a href="{{ route('frontsubscription') }}" class="mangeuser"><i class="flaticon-alarm"></i>Subscription</a>
                            </li>
                            <li>
                                <a href="{{ route('bidWriter') }}" class="bidwriter"><i class="flaticon-auction"></i> Bid Writer</a>
                            </li>
                    
                            <li>
                                <a href="{{ route('myalerts') }}" class="myalerts"><i class="flaticon-alarm"></i>My Alerts</a>
                            </li>
                            <li>
                                <a href="{{ route('whishlist') }}" class="whishlist"><i class="flaticon-star"></i>My Favorites</a>
                            </li>
                            <li>
                                <a href="{{ route('recentallyview') }}" class="recentally"> <i class="flaticon-shake-hand"></i>Recently viewed</a>
                            </li>

                             <li>
                                <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
               @include('frontend.myaccount.'.$template)
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->

   
@endsection
@section("footer")
@parent

@endsection

   