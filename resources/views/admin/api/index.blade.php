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
        <h4 class="text-blue h4">Api Data
        <button class="btn btn-danger btn-sm shadow-sm border-0 refresh float-right">Reset</button>
        </h4>
        
      </div>
      <div class="pb-20">
        <table class="checkbox-datatable table nowrap" id="7dataTableApi">
          <thead>
            <tr>
              
              <th>ID</th>
              <th>Title</th>
              <th>Description</th>
              <th>Api Type</th>
              <th>Publish Date</th>
              <th>Operations</th>
            </tr>
          </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
  
  
</div>
</div>
@endsection
@section("footer")
@parent

{{-- <script src="{{ asset('admin/vendors/scripts/datatable-setting.js') }}"></script> --}}

<script type="text/javascript">
$(document).ready(function() {
function load_data(){
var table = $('.checkbox-datatable').DataTable({
'scrollCollapse': true,
'autoWidth': false,
'responsive': true,
'processing': true,
'serverSide': true,
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
"language": {
"info": "_START_-_END_ of _TOTAL_ entries",
searchPlaceholder: "Search",
paginate: {
next: '<i class="ion-chevron-right"></i>',
previous: '<i class="ion-chevron-left"></i>'
}
},
ajax:{
url: "{{ route('getapiData_admin_ajax') }}",
data:{from_date:'ok'}
},columns:[
{
data: 'id',
name: 'id',
orderable: true,
searchable:true
},
{
data: 'title',
name: 'title',
render: function(data, type, full, meta){
return data.substring(0,40);
},
searchable:true,
orderable: true,
},
{
data: 'description',
name: 'description',
render: function(data, type, full, meta){
return data.substring(0,40);
},
searchable:true,
},
{
data: 'api_type',
name: 'api_type',
orderable: true,
searchable:true
},
{
data: 'published_date',
name: 'publish_Date',
orderable: true,
searchable:false
},
{
data: 'action',
name: 'Operations',
orderable: false,
searchable:false
}
],
});

}
load_data();
$('.refresh').click(function(){
$('.checkbox-datatable').DataTable().destroy();
load_data();
});
});
</script>
@endsection