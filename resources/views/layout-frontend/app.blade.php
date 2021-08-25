{{-- <!DOCTYPE html>

<html lang="en">

<!-- Mirrored from pixner.net/sbidu/main/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jul 2021 09:21:55 GMT -->

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('title')</title>
    @yield('header')

</head>

<body>

  @include('include-frontend.headerHTML') 
  @yield('content')
  @include('include-frontend.footerHTML')
  @yield('footer')
 
</body>


<!-- Mirrored from pixner.net/sbidu/main/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jul 2021 09:22:00 GMT -->

</html> --}}






<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    
    <meta charset="utf-8">

    <link rel="apple-touch-icon" sizes="180x180" href="src/images/logo-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="src/images/logo-icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="src/images/logo-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{-- include all css files and meta tags --}}
    @yield('header')
    <!-- Scripts -->
 <style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #673AB7;
  width: 100px;
  height: 100px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
  </head>
  <body> 
    @include('include-frontend.headerHTML') 
     
    
       @yield('content')
 @include('include-frontend.footerHTML')
  
      @yield('footer')
  </body>
</html>
