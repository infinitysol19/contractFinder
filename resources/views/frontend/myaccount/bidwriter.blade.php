<div class="col-lg-8">


     <div class="dashboard-widget">
        
        <div class="dashboard-purchasing-tabs ">

            <div class="row">

      <div class="col-lg-6">

        <h4 class="text-dark text-capitalize">My Bid Writing Quotes</h4>
       <button class=" WritingQuotes btn btn-warning shadow-lg border-0 text-capitalize mt-2 rounded">request new Bid Writing Quotes</button>

</div>

 <div class="col-lg-6">
<a href="{{ route('dashboard') }}" class="text-capitalize float-right"><i class="fa fa-bell" aria-hidden="true"></i> Mange NotiFications</a>
    <div>

</div>
        </div>


<div class="col-lg-12 mt-3 quotesButtontoggle" style="display:none;">
    
<form action="{{ route('bidWriterFrontPost') }}" method="post">


@csrf

<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
  <div class="form-group">
    <label for="email">Link To Tender</label>
    <input type="text" class="rounded" placeholder="Link To Tender"  required name="link_to_tendor">
  </div>

  <div class="form-group">
    <label for="email">Tender Value</label>
    <input type="text" class="rounded" placeholder="Tendor Worth £"  required name="tender_worth">
  </div>

  <div class="form-group">
    <label for="email">Closing Date </label>
    <input type="date" class="rounded" name="tender_colse_data" placeholder="Tender Closing Date" required>
  </div>
 
<div class="form-group">
    <label for="email">Industry Sectors  </label>
    <input type="text" class="rounded" placeholder="Industry Sectors e.g Health Social care" required name="tender_sector">
  </div>
  <button type="submit" class="btn btn-primary btnprimaryCustom rounded text-capitalize">request Quotes</button>
</form>

</div>
    </div>
        </div></div>
    <div class="auction-wrapper-5">
        <!-- horizontal Contract Post Card Starts -->
        <div class="auction-item-5 time">
            <div class="auction-inner">
                
                <div class="auction-content">
                    <div class="title-area">
                        <h6 class="title">
                        <a href="#0">Level 4 Regulatory Compliance Officer Apprenticeship</a>
                        </h6>
                        <div class="list-area">
                            <span class="list-item col-sm-6">
                                <span class="list-id">Location</span>MK9 3EJ
                            </span>
                            <span class="list-item col-sm-6">
                                <span class="list-id">Category</span>Training services
                            </span>
                        </div>
                        <div class="list-area mt-2">
                            <span class="list-item col-sm-6">
                                <span class="list-id">Value</span>£96,000
                            </span>
                            <span class="list-item col-sm-6">
                                <span class="list-id">Duration</span>49 months
                            </span>
                        </div>
                    </div>
                    <div class="bid-area">
                        <div class="bid-inner ">
                            
                            <h6 class="title pt-3">
                            <a href="#0">Description</a>
                            </h6>
                            
                            <div id="profile-description">
            <div class="text show-more-height">
              
                At Cobalt we help people and businesses throughout the world realize their full potential. 
                We make this simple mission come to life every day through our passion to create technologies and develop products that touch just about every kind of customer.
            </div>
            <div class="show-more">(Show More)</div>
</div><!-- [End] #profile-description -->
                            
               
                         
                            
                        </div>
                    </div>
                    <div class="bid-count-area ">
                        <span class="item col-sm-6">
                            <span class="left">Lot</span>Single Lot
                        </span>
                        <span class="item col-sm-6">
                            <span class="left">Criteria</span>Award Criteria Not Specified
                        </span>
                        
                    </div>
                </div>
                <div class="auction-bidding">
                    <div class="d-flex justify-content-between">
                        <span class="bid-title font-weight-normal text-uppercase mb-2 h6">Status
                        </span>
                        <a href="#" >
                            <span class="fa-stack h5 text-success ">
                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                <i class="fa fa-calendar fa-stack-1x"></i>
                            </span>
                        </a>
                    </div>
                    
                    
                    <div class="bid-incr">
                        <span class="fa-stack h6 text-primary">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fas fa-calendar-check fa-stack-1x"></i>
                        </span>
                        <span class="text-dark">Published : 15/7/2021</span><br>
                        <span class="fa-stack h6 text-primary">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fas fa-calendar-times fa-stack-1x"></i>
                        </span>
                        <span class="text-dark ">Closing : 5/8/2021</span><br>
                        
                    </div>
                    <div class="progress">
                        <!-- <span class="text-dark">Progress Bar</span> -->
                        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Progress Bar
                        </div>
                    </div>
                    {{-- <a href="#0" class="custom-button mt-4 font-weight-bold"><i class="fas fa-eye h6 text-light"></i> View</a> --}}
                </div>
            </div>
        </div>
        <!-- horizontal Contract Post Card ends -->

            <!-- horizontal Contract Post Card Starts -->
        <div class="auction-item-5 time">
            <div class="auction-inner">
                
                <div class="auction-content">
                    <div class="title-area">
                        <h6 class="title">
                        <a href="#0">Level 4 Regulatory Compliance Officer Apprenticeship</a>
                        </h6>
                        <div class="list-area">
                            <span class="list-item col-sm-6">
                                <span class="list-id">Location</span>MK9 3EJ
                            </span>
                            <span class="list-item col-sm-6">
                                <span class="list-id">Category</span>Training services
                            </span>
                        </div>
                        <div class="list-area mt-2">
                            <span class="list-item col-sm-6">
                                <span class="list-id">Value</span>£96,000
                            </span>
                            <span class="list-item col-sm-6">
                                <span class="list-id">Duration</span>49 months
                            </span>
                        </div>
                    </div>
                    <div class="bid-area">
                        <div class="bid-inner ">
                            
                            <h6 class="title pt-3">
                            <a href="#0">Description</a>
                            </h6>
                            
                            <div id="profile-description">
            <div class="text show-more-height">
              
                At Cobalt we help people and businesses throughout the world realize their full potential. 
                We make this simple mission come to life every day through our passion to create technologies and develop products that touch just about every kind of customer.
            </div>
            <div class="show-more">(Show More)</div>
</div><!-- [End] #profile-description -->
                            
               
                         
                            
                        </div>
                    </div>
                    <div class="bid-count-area ">
                        <span class="item col-sm-6">
                            <span class="left">Lot</span>Single Lot
                        </span>
                        <span class="item col-sm-6">
                            <span class="left">Criteria</span>Award Criteria Not Specified
                        </span>
                        
                    </div>
                </div>
                <div class="auction-bidding">
                    <div class="d-flex justify-content-between">
                        <span class="bid-title font-weight-normal text-uppercase mb-2 h6">Status
                        </span>
                        <a href="#" >
                            <span class="fa-stack h5 text-success ">
                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                <i class="fa fa-calendar fa-stack-1x"></i>
                            </span>
                        </a>
                    </div>
                    
                    
                    <div class="bid-incr">
                        <span class="fa-stack h6 text-primary">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fas fa-calendar-check fa-stack-1x"></i>
                        </span>
                        <span class="text-dark">Published : 15/7/2021</span><br>
                        <span class="fa-stack h6 text-primary">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fas fa-calendar-times fa-stack-1x"></i>
                        </span>
                        <span class="text-dark ">Closing : 5/8/2021</span><br>
                        
                    </div>
                    <div class="progress">
                        <!-- <span class="text-dark">Progress Bar</span> -->
                        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Progress Bar
                        </div>
                    </div>
                    {{-- <a href="#0" class="custom-button mt-4 font-weight-bold"><i class="fas fa-eye h6 text-light"></i> View</a> --}}
                </div>
            </div>
        </div>
        <!-- horizontal Contract Post Card ends -->
        
        
        
        
    </div>
</div>
<style type="text/css">
@media (min-width: 1200px){
.container, .container-lg, .container-md, .container-sm, .container-xl {
max-width: 1370px !important;
}
}
.auction-item-5 .auction-inner .auction-content {
width: 65%;

}
.auction-item-5 .auction-inner .auction-bidding {

width: 35%;
}
.auction-item-5 .auction-inner .auction-bidding .bid-incr {

margin-top: 0px;
}
@media (min-width: 768px) and (max-width: 1024px) {

.auction-item-5 .auction-inner .auction-content {
width: 100%;

}
.auction-item-5 .auction-inner .auction-bidding {

width: 100%;
}

}
@media (min-width: 481px) and (max-width: 767px) {

.auction-item-5 .auction-inner .auction-content {
width: 100%;

}
.auction-item-5 .auction-inner .auction-bidding {

width: 100%;
}

}
/*
##Device = Most of the Smartphones Mobiles (Portrait)
##Screen = B/w 320px to 479px
*/
@media (min-width: 320px) and (max-width: 480px) {

.auction-item-5 .auction-inner .auction-content {
width: 100%;

}
.auction-item-5 .auction-inner .auction-bidding {

width: 100%;
}

}



#profile-description .show-more {

  height: 30px; 

  cursor: pointer;
}
#profile-description .show-more:hover { 
    color: #1779dd;
}
#profile-description .show-more-height { 
  height: 50px; 
  overflow:hidden; 
}
</style>