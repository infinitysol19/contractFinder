@extends('admin-layout.app')
@extends('includes-admin.header')
@extends('includes-admin.footer')
@extends('includes-admin.sidebar')
{{-- page titles --}}
@section('title', 'Api Data')
@section('content')
<!-- Begin Page Content -->
<div class="main-container">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> All News</h1>
    
    <a href="{{ route('addnews_admin') }}" class="btn-success btn btn-sm shadow-lg border-0"> Add New Record</a>
  </div>
  <div class="card shadow mb-4">
    
    <div class="card-body">
 
    
        <div class="col-md-12">
          <button type="button" name="refresh" id="refresh" class="btn btn-danger btn-block btn-block btn-sm shadow-lg border-0">Reset</button>
        </div>
      </div>
      <div class="table-responsive table-striped table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        
        <table  class="table dataTable my-0" id="dataTableAuction">
          <thead>
            <tr>
              <th>Image</th>
              <th>Title</th>
              <th>Created Date</th>
              <th>Status</th>
              <th>Operations</th>
            </tr>
          </thead>
   
        </table>
        
      </div>
      
    </div>
    
  </div>
</div>
@endsection
@section("footer")
@parent
<!-- DataTables JavaScript -->
<script src="{{ asset('admin/vendors/scripts/sweetalert.min.js') }}"></script>
<link href="{{ asset('css/toaster.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/toaster.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
$(document).on('click', '.deleteAuction', function(){
news_id = $(this).attr('del-id');
swal({
title: "Are you sure?",
text: "Once deleted, you will not be able to recover this Record!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
$.ajax({
url:"{{ route('deletenews_admin_ajax') }}", 
type:"POST",
dataType:"json",
data:{news_id:news_id,_token:"{{ csrf_token() }}"},
success:function(res)
{
if (res.status=='ok'){
$('#dataTableAuction').DataTable().destroy();
load_data();
toastr.options.closeButton = true;
toastr.success('Record Deleted SuccessFully...!','',{timeOut: 1000})
}else{
swal({
title: "Something Wrong",
text: "",
icon: "warning",
dangerMode: true,
timer: 3000
});
}
}
})
} else {
swal("Your Record is safe!");
}
})
});

function load_data(from_date = '', to_date = '',status=''){



$('#dataTableAuction').DataTable({
processing: true,
serverSide: true,
responsive: true,
ajax:{
url: "{{ route('getallnews_admin_ajax') }}",
data:{from_date:from_date, to_date:to_date,status:status}
},
columns:[
{
data: 'featured_img',
name: 'image',
render: function(data, type, full, meta){
return "<img src={{ URL::to('/') }}/frontend/images/" + full.featured_img + " class='rounded-circle mr-1' width='60' height='60'/>";
},
orderable: false
},
{
data: 'title',
name: 'title',
},

{
data: 'create_datetime',
name: 'created_date',
render: function(data, type, full, meta){
return data;
},
},

{
data: 'status',
name: 'status'
},
{
data: 'action',
name: 'Operations',
orderable: false
}
]
});
}
load_data();
$('#filter').click(function(){
var from_date = $('#date_timepicker_start').val();
var to_date = $('#date_timepicker_end').val();
var status=$('#status').val();


 

function isEmpty(val){
    return (val === undefined || val == null || val.length <= 0) ? true : false;
}



if(!isEmpty(from_date) &&  !isEmpty(to_date)  && !isEmpty(status))
{
$('#dataTableAuction').DataTable().destroy();
load_data(from_date, to_date,status);
}
else
{
  toastr.options.closeButton = true;
toastr.error('Please Fill All Fields Of Filter', '', {timeOut: 3000});
}
});
$('#refresh').click(function(){



$('#dataTableAuction').DataTable().destroy();
load_data();
});
});
</script>
@endsection