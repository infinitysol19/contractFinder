
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
							<h4 class="text-blue h4">Add User
             <a href="{{route('users')}}" class="my-2 btn btn-primary btn-sm shadow-sm border-0  float-right">Go Back <span class="icon-copy ti-arrow-left"></span></a>
							</h4>
						</div>
					
					</div>
					<form method="post" action="{{ route('adduser') }}">
						@csrf
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">First Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="John" name="first_name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Last name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" placeholder="Doe" type="text" name="last_name">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="text" placeholder="+92-322-5555205" name="phone_number">
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Company</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" placeholder="Microsoft" type="text" name="company">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" placeholder="johndoe@example.com" type="email" name="email">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="text" name="password">
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