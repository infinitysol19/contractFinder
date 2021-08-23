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
        <h4 class="text-blue h4">Add Cpv Categories 

        <a href="{{route('cpv_codesview')}}" class="btn btn-success btn-sm shadow-sm border-0  float-right">Add <span class="icon-copy ti-plus"></span></a>
        </h4>
       {{--   <p>According to refrence link <a href="https://www.publictendering.com/cpv-codes/list-of-the-cpv-codes/" target="_blank">Click here...</a></p> --}}
      </div>
      <div class="pb-20">
        <table class="checkbox-datatable table nowrap" id="7dataTableApi">
          <thead>
            <tr>
              
              <th>ID</th>
              <th>Code</th>
              <th>Name</th>
              <th>created_at</th>
              <th>Operations</th>
            </tr>
          </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
  
  
</div>
@endsection
@section("footer")
@parent
<script src="{{ asset('admin/vendors/scripts/sweetalert.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {

$(document).on('click', '.deleteItem', function(){


del_id = $(this).attr('del-id');


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
url:"{{ route('del_ajax_cpv_codes') }}", 
type:"POST",
dataType:"json",
data:{del_id:del_id,_token:"{{ csrf_token() }}"},
success:function(res)
{
if (res.status=='ok'){
$('.checkbox-datatable').DataTable().destroy();
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



function load_data(){
var table = $('.checkbox-datatable').DataTable({
'scrollCollapse': true,
'autoWidth': false,
'responsive': true,
'processing': true,
'serverSide': true,
searching: true,
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
url: "{{ route('cpv_codes_admin_ajax') }}",
data:{from_date:'ok'}
},
columns: [
{data: "id", className: 'id', orderable: true},
{data: "code", className: 'code'},
{data: "name", className: 'name'},
{data: "created_at", className: 'created_at'},
{data: 'action',className: 'Operations',searchable:false}

]
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