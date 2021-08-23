
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
							<h4 class="text-blue h4">Update Package
             <a href="{{route('packages')}}" class="my-2 btn btn-primary btn-sm shadow-sm border-0  float-right">Go Back <span class="icon-copy ti-arrow-left"></span></a>
							</h4>
						</div>
					
					</div>
					<form method="post" action="{{ route('updatepackage') }}">
						@csrf

						<input type="hidden" name="pid" value="{{ $package->id }}">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="Basic" name="name" value="{{ $package->name }}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Price</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="70" type="number" name="price" step="any" value="{{ $package->price }}">
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Free Trial Days</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="12" type="number" name="trial_days" step="any" value="{{ $package->trial_days }}">
							</div>
						</div>

              <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Permissions</label>
							<div class="col-sm-12 col-md-10">
						@php
							$allpermissions=\App\Models\permission::all();
              

       // dd($package->permission_slug);

						@endphp
						 <ul class="list-group list-group-flush">
                   @foreach ($allpermissions as $permission)
                   
                  
						    <li class="list-group-item">
						    		{{ $permission->name }}
						     	 <label class="checkbox">
										<input type="checkbox"   value="{{ $permission->slug }}" name="permissions[]" 

                   @if(!empty($package->permission_slug) && $package->permission_slug!='null' )

                     {{ in_array($permission->slug,json_decode($package->permission_slug)) ? "checked" :""  }}
           
                    @else
                   

                    @endif



										>
									
										   <span class="success"></span>
										     </label>
									</li>
    
									 @endforeach

            </ul>
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
</style>
@endsection