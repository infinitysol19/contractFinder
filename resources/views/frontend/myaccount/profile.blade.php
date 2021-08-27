<div class="col-lg-8">

  <form method="post" action="{{ route('UpdateUserFront') }}" id="ProfileForm">
                        @csrf
                    <div class="row">
                        <div class="col-12">
           
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Personal Details</h4>
                                    <span class="edit editProfile"><i class="flaticon-edit"></i> Edit</span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">First name</div>
                                        <div class="info-value">
                                             
                                            <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" class="input_custom">
                                             @error('first_name')
                                            <p class="my-2 text-white bg-danger shadow-lg rounded-lg text-center">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info-name">Last Name</div>
                                        <div class="info-value">
                                         <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" class="input_custom">

                                           @error('last_name')
                                            <p class="my-2 text-white bg-danger shadow-lg rounded-lg text-center">{{ $message }}</p>
                                            @enderror
                                     </div>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Personal Details</h4>
                                    <span class="edit editProfile"><i class="flaticon-edit"></i> Edit</span>
                                </div>
                                <ul class="dash-pro-body">
                                  
                                 
                                    <li>
                                        <div class="info-name">
                                           Company
                                        </div>
                                        <div class="info-value">
                                             <input type="text" name="company" value="{{ Auth::user()->company }}" class="input_custom">
                                        </div>
                                    </li>

                                    <li>
                                        <div class="info-name">
                                           Industry Sector
                                        </div>
                                        <div class="info-value">
                                             <input type="text" name="industry_sector" value="{{ Auth::user()->industry_sector }}" class="input_custom">
                                        </div>
                                    </li>
                                     <li>
                                        <div class="info-name">
                                         Number of Employees    
                                        </div>
                                        <div class="info-value">
                                    <input type="text" name="number_of_employees" value="{{ Auth::user()->number_of_employees }}" class="input_custom">
                                        </div>
                                    </li>

                                      <li>
                                        <div class="info-name">
                                            Turnover
                                        </div>
                                        <div class="info-value">
                                       <input type="text" name="turnover" value="{{ Auth::user()->turnover }}" class="input_custom">
                                        </div>
                                    </li>
  <li>
                                        <div class="info-name">
                                            Company Post Code
                                        </div>
                                        <div class="info-value">
                <input type="text" name="company_post_code" value="{{ Auth::user()->company_post_code }}" class="input_custom">
                                        </div>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Email Address</h4>
                                    <span class="edit editProfile"><i class="flaticon-edit"></i> Edit</span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Email</div>
                                        <div class="info-value">

                                        {{ Auth::user()->email }}

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Phone</h4>
                                    <span class="edit editProfile"><i class="flaticon-edit"></i> Edit</span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Phone Number</div>
                                        <div class="info-value">
                                            <input type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" class="input_custom">
                                              @error('phone_number')
                                            <p class="my-2 text-white bg-danger shadow-lg rounded-lg text-center">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="dash-pro-item dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Security</h4>
                                    <span class="edit editProfile"><i class="flaticon-edit"></i> Edit</span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Password</div>
                                        <div class="info-value">
                                            

                                             <input type="text" name="password" value="{{ Auth::user()->password_show }}" class="input_custom">
                                               @error('password')
                                            <p class="my-2 text-white bg-danger shadow-lg rounded-lg text-center">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>




               




