   <div class="col-lg-8">
                    <div class="dashboard-widget mb-40">
                        <div class="dashboard-title mb-30">
                            <h5 class="title">My Dashboard</h5>
                        </div>
                        <div class="row justify-content-center mb-30-none">
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-item">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/images/dashboard/01.png') }}" alt="dashboard">
                                    </div>
                                    <div class="content">
                                        <h2 class="title"><span class="counter">80</span></h2>
                                        <h6 class="info">Tendor Matches </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-item">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/images/dashboard/02.png') }}" alt="dashboard">
                                    </div>
                                    <div class="content">
                                        <h2 class="title"><span class="counter">15</span></h2>
                                        <h6 class="info">Active Alerts</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-item">
                                    <div class="thumb">
                                        <img src="{{ asset('frontend/images/dashboard/03.png') }}">
                                    </div>
                                    <div class="content">
                                        <h2 class="title"><span class="counter">115</span></h2>
                                        <h6 class="info">Favorites</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <form method="post" action="{{ route('userSettings') }}" >
                        @csrf

                        @php
                          $alreadySelect=json_decode(Auth::user()->setting);

                         
                        @endphp
                        <div class="dashboard-purchasing-tabs">

                            <button type="submit" class="bg-primary text-white">Upadte</button>
                           <ul class="list-group list-group-flush">
                                      
                  
                            <li class="list-group-item">
                                   <b>New Tender Notifications<br><p style="    margin-top: 3px;
    font-weight: 400;" class="text-capitalize">Recived an Email Notifying  as soon as a New Tendor Matches Your Alert Criteria.</p></b>

                                 <label class="checkbox">
                                        <input type="checkbox" value="daily_email_alerts_new" name="permissions[]" {{ (in_array('daily_email_alerts_new',$alreadySelect))?"checked":"" }}>
                                    
                                           <span class="success"></span>
                                             </label>
                                    </li>
    
                                                         
                  
                            <li class="list-group-item">
                                    <b>Daily Tendor Alerts Summary <p style="    margin-top: 3px;
    font-weight: 400;" class="text-capitalize">Recived A daily email of all tendors wich have met your Alert criteria.</p></b>
                                 <label class="checkbox">
                                        <input type="checkbox" value="daily_email_alerts" name="permissions[]" {{ (in_array('daily_email_alerts',$alreadySelect))?"checked":"" }}>
                                    
                                           <span class="success"></span>
                                             </label>
                                    </li>

  
                                    <li class="list-group-item">
                                   <b> Time Senstive Tendor <p style="    margin-top: 3px;
    font-weight: 400;" class="text-capitalize">Get nofified  when senstive tendor gets posted within 7 days .</p></b>
                                 <label class="checkbox">
                                        <input type="checkbox" value="time_sensitive_tenders_alerts" name="permissions[]" {{ (in_array('time_sensitive_tenders_alerts',$alreadySelect))?"checked":"" }}>
                                    
                                           <span class="success"></span>
                                             </label>
                                    </li>
    
                                                        
                  
                           <li class="list-group-item">
                                    <b>Account Manager Recomendations<p style="    margin-top: 3px;
    font-weight: 400;" class="text-capitalize">your dedicated account manger will notify you with tendors wich would be of interest to your Business.</p></b>
                                 <label class="checkbox">
                                        <input type="checkbox" value="account_manager" name="permissions[]" {{ (in_array('account_manager',$alreadySelect))?"checked":"" }}>
                                    
                                           <span class="success"></span>
                                             </label>
                                    </li>


                                    <li class="list-group-item">
                                   <b>Tendor Writting Tips & Tricks<p style="    margin-top: 3px;
    font-weight: 400;" class="text-capitalize">Recived Eamil with Tips and tricks How Win Tendor opportunties to your Bussiness.</p></b>
                                 <label class="checkbox">
                                        <input type="checkbox" value="bid_writing_advice" name="permissions[]" {{ (in_array('bid_writing_advice',$alreadySelect))?"checked":"" }}>
                                    
                                           <span class="success"></span>
                                             </label>
                                    </li>
    
                                                        
                  
                          
    
                                     
            </ul>
                          
                        </div>
                    </form>
                    </div>
                </div>



   
