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
        @if ($errors->any())
        
        
        @foreach ($errors->all() as $error)
        
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Alert!</strong> {{ $error }}
        </div>
        @endforeach
        
        
        @endif
        {{-- success message display --}}
        @if(session('message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ session('message') }}
        </div>
        @endif
        {{-- error message display if company added --}}
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Alert!</strong> {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-4">
                <div class="dashboard-widget mb-30 mb-lg-0">
                    <div class="user">
                        <div class="thumb-area">
                            <div class="thumb">
                                <img src="{{ asset('frontend/images') }}/{{ Auth::user()->image }}" alt="user">
                            </div>
                            <label for="profile-pic" class="profile-pic-edit"><i class="flaticon-pencil"></i></label>
                            <form method="post" action="{{ route('UpdateUserProfilePic') }}" id="ProfileImage"  enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="profile-pic" class="d-none" accept="image/*" name="profile_pic" value="{{ Auth::user()->image }}">
                                <input type="hidden" name="profile_pic_hidden" value="{{ Auth::user()->image }}">
                            </form>
                        </div>
                        <div class="content">
                            <h5 class="title"><a href="#0">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a></h5>
                            <span class="username">{{ Auth::user()->email }}</span>
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
<script src="{{ asset('admin/vendors/scripts/sweetalert.min.js') }}"></script>
<script type="text/javascript">

jQuery(document).ready(function($) {


 $(".WritingQuotes").click(function(){
    $(".quotesButtontoggle").toggle();
  });


$('.editProfile').click(function (e) {
$('#ProfileForm').submit();
});
$("#profile-pic").click(function (e) {
swal({
title: "Are you sure Change profile Image",
text: "",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
$("#ProfileImage").submit();
} else {
}
})
});

function CountDownTimer(inputDate=''){
// Set the date we're counting down to
var countDownDate = new Date(inputDate).getTime();
// Update the count down every 1 second
var x = setInterval(function() {
// Get today's date and time
var now = new Date().getTime();
// Find the distance between now and the count down date
var distance = countDownDate - now;
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Output the result in an element with id="demo"
$("#countDownTimer").text( days + "d " + hours + "h "
+ minutes + "m " + seconds + "s ");
// If the count down is over, write some text
if (distance < 0) {
clearInterval(x);
$("#countDownTimer").text('Expired');

}
}, 1000);
}
CountDownTimer($('.countDownDatetimeval').text().trim());

//////////////////////////// ////////////////////////////////

   $('.chooosePackage').click(function (e) {
    e.preventDefault();
    
    $("#package_id").val($(this).attr('package-id'));
    $("#package_price").val($(this).attr('packge-price'));
    $("#package_name").val($(this).attr('package-name'));

    $('.customAlertpack').text('Selected Package : '+$(this).attr('package-name'));

     if($(this).attr('package-id')!='1'){
    
    $('.showhidepayment').show();
    }else{
    $('.showhidepayment').hide();
    }
   });


$(".registerClick").click(function (e) {
let package_name_already=$("#package_name").val();
     $('.loader').show();
swal({
title: "Your Current Subscription Plain is "+package_name_already+" Are Sure you Want To Change?",
text: "On Pressing ok, The Payment Will Be Dedicuted From your Account",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {


 
     let package_id=$("#package_id").val();
    let package_price=$("#package_price").val();
    let package_name=$("#package_name").val();
    let card_number=$(".card-number").val();
    let card_cvc=$(".card-cvc").val();
    let card_expiry_month=$(".card-expiry-month").val();
    let card_expiry_year=$(".card-expiry-year").val();


$.ajax({
 url:"{{ route('changesubscription') }}",
    type:"POST",
    dataType:"json",
    data:{
    package_id:package_id,
    package_name:package_name,
    package_price:package_price,
    card_number:card_number,
    card_cvc:card_cvc,
    card_expiry_month:card_expiry_month,
    card_expiry_year:card_expiry_year,
    _token:"{{ csrf_token() }}"},
    success:function(res)
    {

  $('.loader').hide();
if(res.status=='fail'){
    $('.customAlert').show();
    if(res.error){
    var temp2=`<p>${res.error}</p>`;
    $('.customAlert').html(temp2);
    
    }else{
    var temp='';
    $.each(res.errors, function(key, value){
    
    temp+=`<p>${value}</p>`;
    });
    $('.customAlert').html(temp);
    }
    }else{
  
    
      window.location.reload();
    
    }

    },
     error: function(XMLHttpRequest, textStatus, errorThrown) {
    $('.loader').hide();
    console.log("Status: " + textStatus); console.log("Error: " + errorThrown);console.log("Error: " + errorThrown);
    }

});

   
  




}else {

$('.loader').hide();

}


});



});









/////////////////////////////// ////////////////////////////////

});
</script>
<style type="text/css">
@keyframes check {0% {height: 0;width: 0;}
25% {height: 0;width: 10px;}
50% {height: 20px;width: 10px;}
}
.checkbox{background-color:#fff;display:inline-block;height:28px;margin:0 .25em;width:28px;border-radius:4px;border:1px solid #ccc;float:right}
.checkbox span{display:block;height:28px;position:relative;width:28px;padding:0}
.checkbox span:after{-moz-transform:scaleX(-1) rotate(135deg);-ms-transform:scaleX(-1) rotate(135deg);-webkit-transform:scaleX(-1) rotate(135deg);transform:scaleX(-1) rotate(135deg);-moz-transform-origin:left top;-ms-transform-origin:left top;-webkit-transform-origin:left top;transform-origin:left top;border-right:4px solid #fff;border-top:4px solid #fff;content:'';display:block;height:20px;left:3px;position:absolute;top:15px;width:10px}
.checkbox span:hover:after{border-color:#999}
.checkbox input{display:none}
.checkbox input:checked + span:after{-webkit-animation:check .8s;-moz-animation:check .8s;-o-animation:check .8s;animation:check .8s;border-color:#555}
.checkbox input:checked + .default:after{border-color:#444}
.checkbox input:checked + .primary:after{border-color:#2196F3}
.checkbox input:checked + .success:after{border-color:#8bc34a}
.checkbox input:checked + .info:after{border-color:#3de0f5}
.checkbox input:checked + .warning:after{border-color:#FFC107}
.checkbox input:checked + .danger:after{border-color:#f44336}
.input_custom{
height: 40px;
}
.customAlert p{

    color: white;
}
.rounded{

    border-radius: 40px !important;
}

.btnprimaryCustom{

    background: #442DB9 !important;
}
</style>
@endsection