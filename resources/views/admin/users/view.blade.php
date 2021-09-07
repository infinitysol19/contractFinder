
{{-- extend  --}}
@extends('admin-layout.app')
@extends('includes-admin.header')
@extends('includes-admin.footer')
@extends('includes-admin.sidebar')
{{-- page titles --}}
@section('title', 'Dashboard')
@section('content')
<div class="main-container">
  <div class="xs-pd-20-10 pd-ltr-20">
    <div class="title pb-20">

    </div>
    
    <div class="pd-20 card-box mb-30">
          <div class="clearfix">
            <div class="">
              <h4 class="text-blue h4">Subscription Details
             <a href="{{route('users')}}" class="my-2 btn btn-primary btn-sm shadow-sm border-0  float-right">Go Back <span class="icon-copy ti-arrow-left"></span></a>
              </h4>
            </div>
          
          </div>
          <div class="col-lg-12">
    
            <div class="dashboard-widget">
        
        <div class="dashboard-purchasing-tabs text-center">
            
            @php
            $subscription=\App\Models\usersubscription::with('getuserCurrentPackage')->where('user_id',$user->id)->first();
            $package=\App\Models\package::all();
            @endphp
            <h2 class="text-success mb-2 " >Subscription Will End</h2>
            
            <h3 class="text-danger "  id="countDownTimer">{{ $subscription->package_end_date }}</h3>
            <h3 class="text-danger countDownDatetimeval d-none">{{ $subscription->package_end_date }}</h3>
            <div class="row">
                
                <div class="col-lg-12">
                    
                    <div class="card shadow-lg border-0 mt-2 border border-warning">
                        <div class="card-body ">
                            <h1 class="text-warning">Current Package :@isset ($subscription->getuserCurrentPackage)
                            
                            {{ $subscription->getuserCurrentPackage->name }}
                            @endisset  </h1>
                        </div>
                    </div>
                    <br>

                  {{--     <p class="text-danger">Change Package</p>

                        <h5 class="customAlertpack alert alert-info bg-info text-white font-weight-bold shadow-lg border-0">Selected Package :   {{ $subscription->getuserCurrentPackage->name }}</h5> --}}
                 {{--    <div class="row">


                         @foreach ($package as $element)
                        <div class="col-lg-4 mt-2">
                        <button type="button" class="btn btn-success btn-block chooosePackage shadow-lg rounded" packge-price="{{ $element->price}}" package-name="{{ $element->name}}" package-id="{{ $element->id}}">{{ $element->name}}</button>   
                        </div>
                         @endforeach
                    </div> --}}
                   
                  
                    <div class="panel-body showhidepayment" {{ ($subscription->getuserCurrentPackage->id==1)? "style=display:none" : "" }}>
                        
                         <input type="hidden" name="package_id" id="package_id" value="{{ $subscription->getuserCurrentPackage->id }}">
                    <input type="hidden" name="package_price" id="package_price" value="{{ $subscription->getuserCurrentPackage->price }}">
                    <input type="hidden" name="package_name" id="package_name" value="{{ $subscription->getuserCurrentPackage->name }}"> 
                        
                        
                        
                    
                        
                        <div class='form-row row'>
                             <img class="img-responsive pull-right img-fluid" src="{{ asset('/frontend/images/291-2918799_stripe-payment-icon-png-transparent-png-removebg-preview.png') }}" width="300">
                            <div class='col-sm-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                autocomplete='off' class='form-control card-number rounded-lg shadow-lg rounded' size='20'
                                type='text' value="{{ $subscription->card_number }}">
                            </div>
                        </div>
                        
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                class='form-control card-cvc rounded-lg shadow-lg rounded' placeholder='ex. 311' size='4'
                                type='text' value="{{ $subscription->card_cvc }}">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                class='form-control card-expiry-month rounded-lg rounded shadow-lg' placeholder='MM' size='2'
                                type='text' value="{{ $subscription->card_expiry_month }}">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                class='form-control card-expiry-year rounded rounded-lg shadow-lg' placeholder='YYYY' size='4'
                                type='text' value="{{ $subscription->card_expiry_year }}">
                            </div>


                          
                        </div>
                        
                         
                    </div>

                     <div class="loader" style="display:none"></div>
                         <div class="customAlert alert alert-danger bg-danger text-white shadow-lg border-0 " style="display:none"></div>
                        
                        
                       
                </div>
            </div>
            
            
        </div>
        
    </div>
</div>
          



          
        </div>
    
    
  </div>


</div>
@endsection
@section("footer")
@parent

<script type="text/javascript">
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
</script>
@endsection