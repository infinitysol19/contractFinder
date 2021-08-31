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
    <h1 class="h3 mb-0 text-gray-800"> All Conatct Record</h1>
    
    <a href="{{ route('add_contact_admin') }}" class="btn-success btn btn-sm shadow-lg border-0"> Add New Record</a>
  </div>
  <div class="card shadow mb-4">
    
    <div class="card-body">
 
    
      <div class="row input-daterange">
        <div class="col-md-6">
          <button type="button" name="refresh" id="refresh" class="btn btn-danger btn-block btn-block btn-sm shadow-lg border-0">Reset</button>
        </div>
   
        
           <div class="col-md-6 ">
       <button type="button" class="btn-block shadow-lg border-0 btn-success btn-sm sendmail" > Send Email</button>
         </div >
        </div>
      <div class="table-responsive table-striped table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        
        <table  class="table dataTable my-0" id="dataTableAuction">
          <thead>
            <tr>
               <th>Id</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Subject</th>
              <th>Created Date</th>
              <th>Is Read</th>
              <th>Operations</th>
            
            </tr>
          </thead>
   
        </table>
        
      </div>
      
    </div>
    
  </div>
</div>
<!-- /.container-fluid -->



  <!-- The Modal -->
  <div class="modal" id="sendemails">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          
        <button type="button" class="btn btn-success btn-block shadow-lg border-0 goSend " >Send </button>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="tab customcontenttab">
      </div>

            <div class="form-group">
        <div class="form-group"><label for="username"><strong>Subject</strong></label>
        <input type="text" name="subject" class="subject form-control" >
      </div>
    </div>

        <div class="form-group">
        <div class="form-group"><label for="username"><strong>Content</strong></label>
        <textarea name="description" rows="4" id="content_auction" cols="50" class="form-control">{{ old('description') }}</textarea>
      </div>
    </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section("footer")
@parent
<script src="{{ asset('admin/vendors/scripts/sweetalert.min.js') }}"></script>
<link href="{{ asset('css/toaster.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/toaster.min.js') }}"></script>
<script type="text/javascript">


$(document).on('click', '.sendmail', function(){

   
            var favorite = [];
            $.each($("input[name='subscribers']:checked"), function(){

              var emailval = $(this).closest('tr').find('td').eq(1).text();
              
                favorite.push({'id':$(this).val(),'email':emailval});
            });




 favorite =favorite.reduce(
  (accumulator, current) => accumulator.some(x => x.email === current.email)? accumulator: [...accumulator, current ], []
);

 console.log(favorite);

           
if (favorite === undefined || favorite.length == 0) {
  
  toastr.error('Please Select Minimumm 1 email address to sen mail', '', {timeOut: 3000});
}else{

toastr.success('Wait Email Template Prepare...ok !', '', {timeOut: 3000});
var tabtemp='';
favorite.map(function (valp ,index) {
  tabtemp=tabtemp+'<button class="tab">'+valp.email+'</button>'
})
$('.customcontenttab').html(tabtemp);
$('#sendemails').modal('show');
$('.goSend').click(function(){
$(this).text("Sending Wait......!");
function isEmpty(val){
    return (val === undefined || val == null || val.length <= 0) ? true : false;
}

var content_auction=$('#content_auction').val();

 

var subject=$('.subject').val();



if(!isEmpty(content_auction) &&  !isEmpty(subject) )
{

$.ajax({
url:"{{ route('sendmail_subscriber_admin_ajax') }}", 
type:"POST",
dataType:"json",
data:{favorite:favorite,content:content_auction,subject:subject,_token:"{{ csrf_token() }}"},
success:function(res)
{
console.log(res);
$('#sendemails').modal('hide');
$(this).text("Send");
}
})

}
else
{
  $(this).text("Send");
  toastr.options.closeButton = true;
toastr.error('Please Fill All Fields of Mail', '', {timeOut: 3000});
}



});

}
});
           


$(document).ready(function() {
$(document).on('click', '.deleteAuction', function(){





contact_id = $(this).attr('del-id');
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
url:"{{ route('delete_contact_admin_ajax') }}", 
type:"POST",
dataType:"json",
data:{contact_id:contact_id,_token:"{{ csrf_token() }}"},
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
'scrollCollapse': true,
'autoWidth': false,
'responsive': true,
'processing': true,
'serverSide': true,
ajax:{
url: "{{ route('contact_admin_ajax') }}",
data:{from_date:from_date, to_date:to_date,status:status}
},
columns:[
{
data: 'id',
name: 'id',
render: function(data, type, full, meta){
return '<input type="checkbox" class="subscriber" name="subscribers" value="'+data+'"/>';
}
},
{
data: 'email',
name: 'email',
searchable: true,

},
{
data: 'phone',
name: 'phone',
searchable: true,

},
{
data: 'subject',
name: 'subject',
searchable: true,

},

{
data: 'create_datetime',
name: 'created_date',
searchable: true,
render: function(data, type, full, meta){
return data;
},
},

{
data: 'status',
name: 'isread'
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

 
;

$('#dataTableAuction').DataTable().destroy();
load_data();
});
});
</script>
@endsection