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
        <h4 class="text-blue h4">Api Data</h4>
      </div>
      <div class="pb-20 p-4 bg-dark">
       
        <code>

            {{ $apiItem }}
        </code>
    
      
      </div>
    </div>


    
    
  </div>
</div>
@endsection
@section("footer")
@parent 
@endsection