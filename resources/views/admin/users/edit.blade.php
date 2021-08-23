
{{-- extend  --}}
@extends('admin-layout.app')
@extends('includes-admin.header')
@extends('includes-admin.footer')
@extends('includes-admin.sidebar')
{{-- page titles --}}
@section('title', 'User')
@section('content')
<div class="main-container">
  <div class="xs-pd-20-10 pd-ltr-20">
    <div class="title pb-20">

    </div>
    
    <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="">
							<h4 class="text-blue h4">Update User
             <a href="{{route('users')}}" class="my-2 btn btn-primary btn-sm shadow-sm border-0  float-right">Go Back <span class="icon-copy ti-arrow-left"></span></a>
							</h4>
						</div>
					
					</div>
					<form method="post" action="{{ route('updateUser') }}">
						@csrf

						<input type="hidden" name="uid" value="{{ $user->id }}">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">First Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="John" name="first_name" value="{{$user->first_name}}">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Last name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="Doe" type="text" name="last_name" value="{{$user->last_name}}">
							</div>
						</div>

					
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  type="text"  name="phone_number" value="{{$user->phone_number}}" step="any">
								
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Company</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  type="text" name="company" value="{{$user->company}}">
							</div>
						</div>


          <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Industry sector</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  type="text" name="industry_sector" value="{{$user->industry_sector}}">
							</div>
						</div>


						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Number of employees</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  type="text" name="number_of_employees" value="{{$user->number_of_employees}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Turnover</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  type="text" name="turnover" value="{{$user->turnover}}">
							</div>
						</div>
 
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Company post code</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  type="text" name="company_post_code" value="{{$user->company_post_code}}">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="johndoe@example.com" type="email" name="email" readonly="" value="{{$user->email}}">
							</div>
						</div> 
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="{{ $user->password_show }}" type="text" name="password">
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