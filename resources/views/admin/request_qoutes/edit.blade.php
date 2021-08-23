
{{-- extend  --}}
@extends('admin-layout.app')
@extends('includes-admin.header')
@extends('includes-admin.footer')
@extends('includes-admin.sidebar')
{{-- page titles --}}
@section('title', 'request qoutes')
@section('content')
<div class="main-container">
  <div class="xs-pd-20-10 pd-ltr-20">
    <div class="title pb-20">

    </div>
           
    <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="">
							<h4 class="text-blue h4">Update Request Qoutes
             <a href="{{route('req_qoutes')}}" class="my-2 btn btn-primary btn-sm shadow-sm border-0  float-right">Go Back <span class="icon-copy ti-arrow-left"></span></a>
							</h4>
						</div>
					
					</div>
					<form method="post" action="{{ route('updatereq_qoutes') }}">
						@csrf

						<input type="hidden" name="rid" value="{{ $request_qoutes->id }}">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">title</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="John" name="title" value="{{$request_qoutes->title}}" required="">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">	location</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="London Axford" type="text" name="location" value="{{$request_qoutes->location}}" required="">
							</div>
						</div>

					
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">	category</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  type="text"  name="category" value="{{$request_qoutes->category}}" step="any" placeholder="construction bid writing " required="">
								
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">duration</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  type="text" name="duration" value="{{$request_qoutes->duration}}" placeholder="turnaround time" required="">
							</div>
						</div>


          <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">provisional offer rate</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  placeholder="$567" type="text" name="offer" value="{{$request_qoutes->offer}}" required="">
							</div>
						</div>


					

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">description</label>
							<div class="col-sm-12 col-md-10">
                  
                <textarea class="form-control" rows="5" id="comment" name="description" required="">{{$request_qoutes->description}}</textarea>


							
							</div>
						</div>
 
					

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">completed_bids</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="17" type="text" name="completed_bids"  value="{{$request_qoutes->completed_bids}}" required="">
							</div>
						</div> 
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">securing tender percentage rate</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="{{ $request_qoutes->percentage_rate }}" type="text" name="percentage_rate" placeholder="78%" required="">
							</div>
						</div>



						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Qoute Recived date</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="" type="date" name="qoute_rec"  value="{{$request_qoutes->qoute_rec}}" required="">
							</div>
						</div> 


						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Qoute Close date</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="" type="date" name="qoute_end"  value="{{$request_qoutes->qoute_end}}" required="">
							</div>
						</div> 
 
 
             <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Reply status Mark</label>
							<div class="col-sm-12 col-md-10">
							<select class="form-control" name="reply" required="">
           
           <option value="yes" {{ ($request_qoutes->reply=='yes')? "selected":"" }}>yes</option>
           <option value="no" {{ ($request_qoutes->reply=='no')? "selected":"" }}>no</option>
               </select>
							</div>
						</div> 
					
						
							<div class="clearfix">
								<button type="submit" class="btn btn-success btn-sm code-copy pull-left" data-clipboard-target="#copy-pre">Update</button>
								
							</div>
					</form>
					
				</div>
    
    
  </div>


</div>
@endsection
@section("footer")
@parent
@endsection