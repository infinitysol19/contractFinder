
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    
    @yield('seo_content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
    {{-- include all css files and meta tags --}}
    @yield('header')
    <!-- Scripts -->
 <style>

 .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #693FF5;
    border-color:#693FF5;
}
 .pagination li a {
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
     width: 100%; 
    height: 100%; 
   line-height: initial;
    text-align: center;
    background: #ffffff;
    border: 1px solid #693FF5;
    box-shadow: 0px 15px 30px 0px rgb(119 123 146 / 10%);
    color: #52606d;
    font-weight: 700;

  }
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


       <script type="text/javascript">
  

  jQuery(document).ready(function($) {
      
      

$('.newsLetterSubscriber').click(function(e){

e.preventDefault();

$('.loader').show();

var subsemail=$('#subsemail').val();



function validateEmail(email) {

    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return re.test(String(email).toLowerCase());

}



if(!validateEmail(subsemail)){
$('.loader').hide();
toastr.options.closeButton = true;

toastr.error('Please Enter A Valid Email Address', '', {timeOut: 3000});

}



var create_datetime=$('#create_datetimefooter').val();

function isEmpty(val){

return (val === undefined || val == null || val.length <= 0) ? true : false;

}









if(!isEmpty(subsemail)){

// $("#subscriber_fromfront").submit()







$.ajax({

url:"{{ route('postSubscribeFront') }}",

type:"POST",

dataType:"json",

data:{subsemail:subsemail,create_datetime:create_datetime,_token:"{{ csrf_token() }}"},

success:function(res)

{



$(".loader").hide();

$('.loader').hide();

if(res.status=='ok'){

toastr.options.closeButton = true;

toastr.success('Subscription Verification Link has Been Sent To Your Email... Please Verify', '', {timeOut: 3000});

}else if(res.status=='resend'){

toastr.options.closeButton = true;

toastr.success('Subscription Verification Link has Been Sent To Your Email... Please Verify', '', {timeOut: 3000});

}else{

toastr.options.closeButton = true;

toastr.success('You Are Already Subscriber', '', {timeOut: 3000});

}

},

error: function(XMLHttpRequest, textStatus, errorThrown) {

console.log("Status: " + textStatus); console.log("Error: " + errorThrown);console.log("Error: " + errorThrown);

}

});

}else{
$('.loader').hide();
toastr.options.closeButton = true;

toastr.error('Please Add Email Address For Subscription', '', {timeOut: 3000});

}

});


  });
    </script>
  </body>
</html>
