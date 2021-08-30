{{-- extend  --}}
@extends('admin-layout.app')
@extends('includes-admin.header')
@extends('includes-admin.footer')
@extends('includes-admin.sidebar')
{{-- page titles --}}
@section('title', 'Api Data')
@section('content')
<div class="main-container">
  <div class="xs-pd-20-10 pd-ltr-20">
    <div class="title pb-20">
    </div>
    
    
    
    <div class="card-box pb-10">
      
      <div class="pd-20">
        
        <h4 class="text-blue h4">Site Settings

          <form method="post" action="{{ route('setEnvvarables') }}" enctype="multipart/form-data">
            @csrf
          

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Site Header Logo</label>
              <div class="col-sm-12 col-md-10">
              <input type="file" name="hlogo" class="form-control" accept="image/*">
              </div>
              <input type="hidden" name="hlogohidden" class="form-control" value="{{ config('custom_env_Variables.SITE_LOGO') }}" >
               <img src="{{ asset('admin/vender/images') }}/{{ config('custom_env_Variables.SITE_LOGO') }}" class="img-thumbnail" style="max-height:50px;" />
            </div>
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Site Footer Logo</label>
              <div class="col-sm-12 col-md-10">
              <input type="file" name="flogo" class="form-control" accept="image/*">
              </div> 
                <input type="hidden" name="flogohidden" class="form-control" value="{{ config('custom_env_Variables.SITE_LOGO_FOOTER') }}" >
                <img src="{{ asset('admin/vender/images') }}/{{ config('custom_env_Variables.SITE_LOGO_FOOTER') }}" class="img-thumbnail" style="max-height:50px;" />
            </div>

            @php
             $settings= \App\Models\Settings::find(1)->first();
            @endphp
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Home h1 Text</label>
              <div class="col-sm-12 col-md-10">
               <textarea name="home_banner_h1" rows="4" id="home_banner_h1" cols="50" class="form-control" required="" spellcheck="false">{{  $settings->home_banner_h1 }}</textarea>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Home p1 Text</label>
              <div class="col-sm-12 col-md-10">
               <textarea name="home_banner_p" rows="4" id="home_banner_p" cols="50" class="form-control" required="" spellcheck="false">{{  $settings->home_banner_p }} </textarea>
              </div>
            </div> 
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Home p2 Text</label>
              <div class="col-sm-12 col-md-10">
                <textarea name="home_banner_p2" rows="4" id="home_banner_p" cols="50" class="form-control" required="" spellcheck="false">{{  $settings->home_banner_p2 }}</textarea>
              </div>
            </div>
          

           <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">MAIL_FROM_ADDRESS</label>
              <div class="col-sm-12 col-md-10">
              <input type="Text" name="MAIL_FROM_ADDRESS" class="form-control" value="{{ config('custom_env_Variables.MAIL_FROM_ADDRESS') }}">
              </div>
            </div>

             <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">MAIL_FROM_NAME</label>
              <div class="col-sm-12 col-md-10">
              <input type="Text" name="MAIL_FROM_NAME" class="form-control" value="{{ config('custom_env_Variables.MAIL_FROM_NAME') }}">
              </div>
            </div>

             <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">MAIL_SUBJECT</label>
              <div class="col-sm-12 col-md-10">
              <input type="Text" name="MAIL_SUBJECT" class="form-control" value="{{ config('custom_env_Variables.MAIL_SUBJECT') }}" >
              </div>
            </div>

             <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">MAIL_TO_CONTACT</label>
              <div class="col-sm-12 col-md-10">
              <input type="Text" name="MAIL_TO_CONTACT" class="form-control" value="{{ config('custom_env_Variables.MAIL_TO_CONTACT') }}">
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">APP_URL</label>
              <div class="col-sm-12 col-md-10">
              <input type="Text" name="APP_URL" class="form-control" value="{{ config('custom_env_Variables.APP_URL') }}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">APP_NAME</label>
              <div class="col-sm-12 col-md-10">
              <input type="Text" name="APP_NAME" class="form-control" value="{{ config('custom_env_Variables.APP_NAME') }}" >
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">STRIPE_KEY</label>
              <div class="col-sm-12 col-md-10">
              <input type="Text" name="STRIPE_KEY" class="form-control" value="{{ config('custom_env_Variables.STRIPE_KEY') }}" >
              </div>
            </div>


            <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">STRIPE_SECRET</label>
              <div class="col-sm-12 col-md-10">
              <input type="Text" name="STRIPE_SECRET" class="form-control" value="{{ config('custom_env_Variables.STRIPE_SECRET') }}" >
              </div>
            </div>

   
            <div class="collapse-box collapse show" id="basic-form1" style="">
            <div class="code-box">
              <div class="clearfix">
                <button type="submit" class="btn btn-success btn-sm code-copy pull-left" data-clipboard-target="#copy-pre">Save</button>
                
              </div>
          </form>
       
        
      </div>
      <div class="pb-20">
       
    </div>
  </div>
  
  
</div>
@endsection
@section("footer")
@parent

@endsection