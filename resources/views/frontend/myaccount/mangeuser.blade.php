<div class="col-lg-8">
   
    <div class="dashboard-widget">
      
            <div class="dashboard-purchasing-tabs text-center">
              

              @php
                 $subscription=\App\Models\usersubscription::where('user_id',Auth::user()->id)->first();
              @endphp

                <h2 class="text-success mb-2">Subscription Days Left</h2>
              <h3 class="text-danger countDownDatetimeval">{{ $subscription->package_end_date }}</h3> 
          
                
            </div>
      
    </div>
</div>