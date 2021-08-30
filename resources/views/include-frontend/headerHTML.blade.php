
    <!--============= ScrollToTop Section Starts Here =============-->

    <div class="overlayer" id="overlayer">

        <div class="loader">

            <div class="loader-inner"></div>

        </div>

    </div>

    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>

    <div class="overlay"></div>

    <!--============= ScrollToTop Section Ends Here =============-->


    <!--============= Header Section Starts Here =============-->

    <header>

        <div class="header-top">

            <div class="container">

                <div class="header-top-wrapper d-flex justify-content-end">

                   

                    <ul class="nav justify-content-center">

                                  

                        <li class="nav-item">

                            <a href="{{ route('dashboard') }}" class="nav-link text-white">My Account</a>

                        </li>  

                         @if (Auth::check())
                           <li class="nav-item">

                            <a href="{{ route('logout') }}" class="nav-link text-white" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                        </li>  
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                          @else
                        <li class="nav-item">

                            <a href="{{ route('login') }}" class="nav-link text-white">Sign In </a>

                        </li>  

                        <li class="nav-item">

                            <a href="{{ route('register') }}" class="nav-link text-white">Sign Up</a>

                        </li>   

                          @endif
                         

                                        

                    </ul>

                </div>

            </div>

        </div>

        <div class="header-bottom">

            <div class="container">

                <div class="header-wrapper">

                    <div class="logo">

                        <a href="{{route('myhome')}}">

                            <img src="{{asset('frontend/images/logo/2.png')}}" alt="logo">

                        </a>

                    </div>

                    <ul class="menu m-2">

                        <li>

                            <a href="{{route('livesearch')}}">Advice andp Tips</a>

                        </li>

                        <li>

                            <a href="{{route('livesearch')}}">Search Live Tenders</a>

                        </li>

                        <li>

                            <a href="{{route('historicalsearch')}}">Historical Search</a>

                        </li>

                         <li>

                            <a href="#">Market Analysis</a>

                            <ul class="submenu">

                                <li>

                                    <a href="{{route('livesearch')}}">Find Your Competitors</a>

                                </li>

                                <li>

                                    <a href="{{route('livesearch')}}">Buyer Behaviour Analysis</a>

                                </li>

                               

                        

                            </ul>

                        </li>

                         <li>

                            <a href="{{ route('pricing') }}">Pricing</a>

                        </li>


                         <li>

                            <a href="#">My Account</a>
                       <ul class="submenu">
                             <li>

                            <a href="{{ route('dashboard') }}" >Profile </a>

                        </li> 
                                   @if (Auth::check())
                           <li>

                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                        </li>  
                     
                          @else


                         <li>

                            <a href="{{ route('dashboard') }}" >Profile </a>

                        </li> 
                        <li>

                            <a href="{{ route('login') }}" >Sign In </a>

                        </li>  

                        <li>

                            <a href="{{ route('register') }}" >Sign Up</a>

                        </li>   

                          @endif

                               

                        

                            </ul>
                        </li>

                        

                    </ul>

                    <div class="header-bar d-lg-none">

                        <span></span>

                        <span></span>

                        <span></span>

                    </div>

                </div>

            </div>

        </div>

    </header>