<div class="auction-wrapper-5">
    @foreach($apidata as $row)
    
                                 @php
                             $json_obj = json_decode($row->object, true);

                             @endphp
    <!-- horizontal Contract Post Card Starts -->
    <div class="auction-item-5 time">
        <div class="auction-inner">
            
            <div class="auction-content">
                <div class="title-area">
                   
                    <h4 class="title">
                    <a href="http://localhost/contractfinderpro/product-detail.php">
                        {{ $row->title }}
                    </a>
                    </h4>
                    <h6 class="title text-secondary ">
                    @if($row->api_type=='3')
                    @if(!empty($row->buyer_name_1) && !empty($row->buyer_name_2))
                    {{$row->buyer_name_1  }}
                    @elseif(!empty($row->buyer_name_1))
                    {{ $row->buyer_name_1 }}
                    @else
                    {{ $row->buyer_name_2 }}
                    @endif
                    
                    @endif
                    </h6>
                    <div class="list-area">
                        <span class="list-item col-sm-4">
                            <span class="list-id">Location</span>
                            @if ($row->api_type=='3')
                            @if (!empty($row->location))
                            {{ $row->location }}
                            @else
                            Not Found
                            @endif
                            
                            @endif 
                        </span>
                        <span class="list-item col-sm-4">
                            <span class="list-id">Category</span>
                            @if($row->api_type=='3')
                            @if(!empty($row->cpv))
                            

                            {{ \App\Models\Cpv_codes::where('code',substr($row->cpv, 0, 2))->first()->name  }}
                             
                            @else

                           
                              @php
                            $cpvjson = json_decode($row->cpvjson, true);
                             echo $cpvjson->description ;
                              @endphp
                            @endif
                            
                            @endif
                        </span>
                        <span class="list-item col-sm-4">
                            <span class="list-id">Lot</span>

                           @if($row->api_type=='3')
                            @if(!empty($row->object))
                            
                             
                           {{ (array_key_exists('tenderPeriod',$json_obj['releases'][0]['tender']))? $json_obj['releases'][0]['tender']['id'] :NULL }}  

                             
                             
                            
                            @else

                           {{ 'Not Exist' }}
                            @endif
                            @endif
                        </span>
                    </div>
                </div>
                <div class="bid-area">
                    <div class="bid-inner ">
                        
                        <h6 class="title pt-3">
                        <a href="#0">Bid Writer Message</a>
                        </h6>
                        <p class="pt-3 pb-3">{!! Str::limit($row->description,400) !!}</p>
                        
                    </div>
                </div>
            </div>
            <div class="auction-bidding">
                <div class="d-flex justify-content-between">
                    <span class="bid-title font-weight-normal text-uppercase  h8">
                    </span>
                    <a href="#" >
                        <span class="fa-stack h5 text-success calender">
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
                       @if($row->api_type=='3')
                    <span class="text-dark font-weight-bold">Published :{{ \Carbon\Carbon::parse($row->published_date)->format('d/m/Y')}} </span>
                       @endif
                    <br>
                    <span class="fa-stack h6 text-primary">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fas fa-calendar-times fa-stack-1x"></i>
                    </span>

                     @if($row->api_type=='3')
                    <span class="text-dark font-weight-bold">Closing : 
                        {{\Carbon\Carbon::parse( (array_key_exists('tenderPeriod',$json_obj['releases'][0]['tender']))? $json_obj['releases'][0]['tender']['tenderPeriod']['endDate'] :NULL)->format('d/m/Y')}}
                 @endif
                    </span><br>
                    <span class="fa-stack h6 text-primary">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fas fa-comment-dollar fa-stack-1x"></i>
                    </span>
                    <span class="text-dark font-weight-bold">
                        @if($row->api_type=='3')
                        @if(!empty($row->price) && !empty($row->min_price))
                        Min: {{$row->min_price  }} Max: {{ $row->price }}
                        @elseif(!empty($row->price))
                        {{ $row->price }}
                        @else
                        {{ $row->min_price }}
                        @endif
                        {{ $row->currency }}
                        @endif
                    </span><br>
                    <span class="fa-stack h6 text-primary">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fas fa-clock fa-stack-1x"></i>
                    </span>
                    @if($row->api_type=='3')
                    <span class="text-dark font-weight-bold">Duration: 
 
@php
         
$date1 = new DateTime((array_key_exists('tenderPeriod',$json_obj['releases'][0]['tender']))? $json_obj['releases'][0]['tender']['tenderPeriod']['endDate'] :NULL);
$date2 = new DateTime($row->published_date);
$interval = $date1->diff($date2);
// echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 


echo $interval->days . " days ";
@endphp

                    </span>
@endif
                    <br>
                    
                </div>
                <div class="progress">
                    <!-- <span class="text-dark">Progress Bar</span> -->
                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">31 Days to close
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="#0" class="custom-button-white mt-4 font-weight-bold"><i class="fas fa-star h6 text-warning"></i>Watch</a>
                    </div>
                    <div class="col-md-6">
                        <a href="#0" class="custom-button mt-4 font-weight-bold"><i class="fas fa-eye h6 text-light"></i>View</a>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    <!-- horizontal Contract Post Card ends -->
    @endforeach
</div>
{!! $apidata->links() !!}