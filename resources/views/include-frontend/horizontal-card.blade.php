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
                    {{-- ////////////////////////////////////////////////////////////////////// --}}
                    @if($row->api_type=='1')
                    @if(!empty($row->buyer_name_1) && !empty($row->buyer_name_2))
                    {{$row->buyer_name_1  }}
                    @elseif(!empty($row->buyer_name_1))
                    {{ $row->buyer_name_1 }}
                    @else
                    {{ $row->buyer_name_2 }}
                    @endif
                    
                    @endif
                    {{--   ////////////////////////////////////////////////// --}}
                    {{-- ////////////////////////////////////////////////////////////////////// --}}
                    @if($row->api_type=='2')
                    @if(!empty($row->buyer_name_1) && !empty($row->buyer_name_2))
                    {{$row->buyer_name_1  }}
                    @elseif(!empty($row->buyer_name_1))
                    {{ $row->buyer_name_1 }}
                    @else
                    {{ $row->buyer_name_2 }}
                    @endif
                    
                    @endif
                    {{--   ////////////////////////////////////////////////// --}}
                    @if($row->api_type=='3')
                    @if(!empty($row->buyer_name_1) && !empty($row->buyer_name_2))
                    {{$row->buyer_name_1  }}
                    @elseif(!empty($row->buyer_name_1))
                    {{ $row->buyer_name_1 }}
                    @else
                    {{ $row->buyer_name_2 }}
                    @endif
                    
                    @endif
                    {{-- ////////////////////////////////////////////////////////////////////////// --}}
                    </h6>
                    <div class="list-area">
                        <span class="list-item col-sm-4">
                            <span class="list-id">Location</span>
                            {{-- ////////////////////////////////////////////////////////////////////// --}}
                            @if($row->api_type=='1')
                            @if (!empty($row->location))
                            {{ $row->location }}
                            @else
                            Not Found
                            @endif
                            
                            @endif
                            {{--   ////////////////////////////////////////////////// --}}
                            {{-- ////////////////////////////////////////////////////////////////////// --}}
                            @if($row->api_type=='2')
                            @if (!empty($row->location))
                            {{ $row->location }}
                            @else

                             {{ $row->location2 }}
                            @endif
                            
                            @endif
                            {{--   ////////////////////////////////////////////////// --}}
                            @if ($row->api_type=='3')
                            @if (!empty($row->location))
                            {{ $row->location }}
                            @else
                            Not Found
                            @endif
                            
                            @endif
                        </span>
                            <span class="list-item col-sm-4 text-capitalize">
                            <span class="list-id">Category</span>
                            {{-- ////////////////////////////////////// --}}
                            
                            @if($row->api_type=='1')
                            @if(!empty($row->cpvjson))
                            @php
                            $cpvjson = json_decode($row->cpvjson, true);
                            $Ccode=(array_key_exists(0,$cpvjson))? $cpvjson[0]['@attributes']['code']:$cpvjson['@attributes']['code'];
                            
                            @endphp
                            
                            {{ \App\Models\Cpv_codes::where('code',substr($Ccode, 0, 2))->first()->name  }}
                            
                            @else
                            
                            Not Found
                            @endif
                            
                            @endif
                            @if($row->api_type=='2')
                            @if(!empty($row->cpv))
                            
                            {{ \App\Models\Cpv_codes::where('code',substr($row->cpv, 0, 2))->first()->name  }}
                            
                            @else
                            
                            Not Found
                            @endif
                            
                            @endif
                            {{--   ////////////////////////////////////// --}}
                            @if($row->api_type=='3')
                            @if(!empty($row->cpv))
                            
                            {{ \App\Models\Cpv_codes::where('code',substr($row->cpv, 0, 2))->first()->name  }}
                            
                            @else
                            
                            Not Found
                            @endif
                            
                            @endif
                        </span>
                        @if($row->api_type=='2')
                        @if(!empty($row->summary))
                        <span class="list-item col-sm-4">
                            <span class="list-id">Lot</span>
                            
                            {{ $row->summary }}
                            
                            
                            
                        </span>
                        @else
                        {{ 'Not Exist' }}
                        @endif
                        @endif
                        @if($row->api_type=='3')
                        @if(!empty($row->object))
                        <span class="list-item col-sm-4">
                            <span class="list-id">Lot</span>
                            
                            {{ (array_key_exists('tenderPeriod',$json_obj['releases'][0]['tender']))? $json_obj['releases'][0]['tender']['id'] :NULL }}
                            
                            
                            
                        </span>
                        @else
                        {{ 'Not Exist' }}
                        @endif
                        @endif
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
                    @if($row->api_type=='1')
                    <span class="text-dark font-weight-bold">Published :{{ \Carbon\Carbon::parse($row->published_date)->format('d/m/Y')}} </span>
                    @endif
                    @if($row->api_type=='2')
                    <span class="text-dark font-weight-bold">Published :{{ \Carbon\Carbon::parse($row->published_date)->format('d/m/Y')}} </span>
                    @endif
                    @if($row->api_type=='3')
                    <span class="text-dark font-weight-bold">Published :{{ \Carbon\Carbon::parse($row->published_date)->format('d/m/Y')}} </span>
                    @endif
                    <br>
                    <span class="fa-stack h6 text-primary">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fas fa-calendar-times fa-stack-1x"></i>
                    </span>
                    @if($row->api_type=='1')
                    <span class="text-dark font-weight-bold">Closing :
                        {{ \Carbon\Carbon::parse($row->end_date)->format('d/m/Y')}}
                        @endif
                        @if($row->api_type=='2')
                        <span class="text-dark font-weight-bold">Closing :
                            {{ \Carbon\Carbon::parse($row->end_date)->format('d/m/Y')}}
                            @endif
                            @if($row->api_type=='3')
                            <span class="text-dark font-weight-bold">Closing :
                                {{ \Carbon\Carbon::parse($row->end_date)->format('d/m/Y')}}
                                @endif
                            </span><br>
                            @if($row->api_type=='3')
                            <span class="fa-stack h6 text-primary">
                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                <i class="fas fa-comment-dollar fa-stack-1x"></i>
                            </span>
                            <span class="text-dark font-weight-bold">
                                
                                @if(!empty($row->price) && !empty($row->min_price))
                                Value: {{$row->min_price  }} to {{$row->price  }}
                                @elseif(!empty($row->price))
                                Value: {{ $row->min_price }}
                                @else
                               Value: {{ $row->min_price }}
                                @endif
                               
                                
                                @if($row->currency=='GBP')
                               {{ "??" }}
                                @else
                                 {{ $row->currency }}
                                @endif
                            </span>
                            <br>
                            @endif
                            
                            <span class="fa-stack h6 text-primary">
                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                <i class="fas fa-clock fa-stack-1x"></i>
                            </span>
                            @if($row->api_type=='1')
                            <span class="text-dark font-weight-bold">Duration:
                                
                                @php
                                
                               
                                echo CH::DaysDiff($row->end_date,$row->published_date).'Days';
                                $progressbar=0;

                               

                                 $duration=CH::DaysDiff($row->end_date,$row->published_date);
                                
                                @endphp
                            </span>
                            @endif
                            @if($row->api_type=='2')
                            <span class="text-dark font-weight-bold">Duration:
                                
                                @php
                                
                               echo CH::DaysDiff($row->end_date,$row->published_date).'Days';
                                $progressbar=0;

                               

                                 $duration=CH::DaysDiff($row->end_date,$row->published_date);
                                @endphp
                            </span>
                            @endif
                            @if($row->api_type=='3')
                            <span class="text-dark font-weight-bold">Duration:
                                
                                @php
                             echo CH::DaysDiff($row->end_date,$row->published_date).'Days';
                                $progressbar=0;

                               

                                 $duration=CH::DaysDiff($row->end_date,$row->published_date);
                                
                                @endphp
                            </span>
                            @endif
                            <br>
                            
                        </div>
                        <div class="progress">
                            <!-- <span class="text-dark">Progress Bar</span> -->
                            @if($row->api_type=='1')
                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: {{ $duration }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $duration}} Days to close
                            </div>
                            @endif

                            @if($row->api_type=='2')
                            
                            @if($row->tag=='active')
                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: {{ $duration }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $duration}} Days to close
                            </div>
                            @else
                            <div class="progress-bar progress-bar-striped bg-dark progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Status: Canceled
                            </div>
                            @endif
                            @endif
                            @if($row->api_type=='3')
                            
                            @if($row->tag=='award')
                            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"> Status: Awarded
                            </div>
                            @elseif($row->tag=='active')
                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: {{ $duration }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $duration}} Days to close
                            </div>
                            @elseif($row->tag=='planning')
                            <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar" style="width: {{ $duration }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> Status: Planning
                            </div>
                            @elseif($row->tag=='cancel')
                            <div class="progress-bar progress-bar-striped bg-dark progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Status: Canceled
                            </div>
                            @else
                            @endif
                            
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#0" class="custom-button-white mt-4 font-weight-bold"><i class="fas fa-star h6 text-warning"></i>Watch</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('tenderdetail',['id'=>$row->id]) }}" class="custom-button mt-4 font-weight-bold"><i class="fas fa-eye h6 text-light"></i>View</a>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- horizontal Contract Post Card ends -->
            @endforeach
        </div>
        {!! $apidata->links() !!}