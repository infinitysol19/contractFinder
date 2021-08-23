
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
							<h4 class="text-blue h4">Update Cpv Category
             <a href="{{route('cpv_codes')}}" class="my-2 btn btn-primary btn-sm shadow-sm border-0  float-right">Go Back <span class="icon-copy ti-arrow-left"></span></a>
							</h4>
						</div>
					
					</div>
					<form method="post" action="{{ route('updatecpv_codes') }}">
						@csrf

						<input type="hidden" name="pid" value="{{ $countrymockup->id }}">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Basic" name="name" value="{{ $countrymockup->name }}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Code</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="70" type="text" name="code"  value="{{ $countrymockup->code }}">
							</div>
						</div>

						<div class="collapse-box collapse show" id="basic-form1" style="">
						<div class="code-box">
							<div class="clearfix">
								<button type="submit" class="btn btn-success btn-sm code-copy pull-left" data-clipboard-target="#copy-pre">Save</button>
								
							</div>
					</form>
					
				</div>
    
    
  </div>


</div>
@endsection
@section("footer")
@parent
@endsection