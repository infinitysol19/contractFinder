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
    <div class="row pb-10">
      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark">
               @php
                echo \App\Models\User::count();
               @endphp
              </div>
              <div class="font-14 text-secondary weight-500">Users</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-calendar1"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark"> @php
                echo \App\Models\apidata::count();
               @endphp</div>
              <div class="font-14 text-secondary weight-500">Api Total Records</div>
            </div>
            <div class="widget-icon">
              <div class="icon" data-color="#ff5b5b"><span class="icon-copy dw dw-calendar1"></span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark">
                @php
                echo \App\Models\package::count();
               @endphp
              </div>
              <div class="font-14 text-secondary weight-500">Packges</div>
            </div>
            <div class="widget-icon">
              <div class="icon"><i class="icon-copy dw dw-calendar1" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
          <div class="d-flex flex-wrap">
            <div class="widget-data">
              <div class="weight-700 font-24 text-dark">
                @php
                echo \App\Models\Request_Qoutes::count();
               @endphp
              </div>
              <div class="font-14 text-secondary weight-500">Request Qoutes</div>
            </div>
            <div class="widget-icon">
              <div class="icon"><i class="icon-copy dw dw-calendar1" aria-hidden="true"></i></div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    
    
    <div class="card-box pb-10 p-3">
    

      <div class="row">
        

        <div class="col-sm-6">
            <h3> Users Data</h3>
          {!! $chart1->renderHtml() !!}

        </div>
           <div class="col-sm-6">
            
              <h3> Request Qoutes Data</h3>

             {!! $chart3->renderHtml() !!}
           </div>
   

            <div class="col-sm-12">
             <h3> Api Data</h3>
             {!! $chart2->renderHtml() !!}
           </div>
      </div>
   
    </div> 
    
    
  </div>
</div>
@endsection
@section("footer")
@parent
{!! $chart1->renderChartJsLibrary() !!}
 
{!! $chart1->renderJs() !!}
{!! $chart2->renderJs() !!}
{!! $chart3->renderJs() !!}
@endsection