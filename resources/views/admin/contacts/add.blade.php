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
    <h1 class="h3 mb-0 text-gray-800"> Add Contact Record</h1>
      <a href="{{ route('contact_admin') }}" class="btn-primary btn btn-sm shadow-lg border-0">Go Back</a>
  </div>
  <div class="card shadow mb-4">
    
    <div class="card-body">
 
      <form method="POST" action="{{ route('insert_contact_admin') }}" enctype="multipart/form-data">

        @csrf
    
          <div class="form-group">
          <div class="form-group"><label for="username"><strong>Name</strong></label>
          <input class="form-control" type="text" placeholder="Jhon deo" name="name" id="name" value="{{ old('name') }}">
        </div>
      </div>
      <div class="form-group">
          <div class="form-group"><label for="username"><strong>subject</strong></label>
          <input class="form-control" type="text" placeholder="abc" name="subject" id="subject" value="{{ old('subject') }}">
        </div>
      </div>
        <div class="form-group">
          <div class="form-group"><label for="username"><strong>Phone</strong></label>
          <input class="form-control" type="text" placeholder="+9234675878" name="phone" id="phone" value="{{ old('phone') }}">
        </div>
      </div>
        <div class="form-group">
          <div class="form-group"><label for="username"><strong>Email</strong></label>
          <input class="form-control" type="text" placeholder="abc@gamil.com" name="email" id="email" value="{{ old('email') }}">
        </div>
      </div>
      <div class="form-group">
        <div class="form-group"><label for="username"><strong>Content</strong></label>
        <textarea name="description" rows="4" id="content_auction" cols="50" class="form-control">{{ old('description') }}</textarea>
      </div>
    </div>
      <div class="form-group">
      <div class="form-group"><label for="username"><strong>Created Date</strong></label>
      <input class="form-control datetimepicker" type="text" name="create_datetime" id="date_timepicker_start" value="{{ old('create_datetime ') }}">
    </div>
  </div>
 <div class="form-group">
      <div class="form-group"><label for="username"><strong>Terms Agree</strong></label>
    <select name="is_agree" class="form-control">
    
        <option value="yes">yes</option>
        <option value="no">no</option>
   
    </select>
    </div>
  </div>
    <div class="form-group">
      <div class="form-group"><label for="username"><strong> Read Status</strong></label>
    <select name="status" class="form-control">
      <option value="on">yes</option>
      <option value="off">no</option>
   
    </select>
    </div>
  </div>
  <div class="form-group"><button class="custompostionbtn btn btn-success btn-sm shadow-lg border border-success" type="submit">Save</button>
  {{-- <a  href="{{ route('auction_dashboard') }}" class="btn btn-light btn-lg shadow-lg border border-dark" type="submit">Go Back To All Auction</a> --}}</div>
</form>
</div>

</div>
</div>
<!-- /.container-fluid -->
@endsection
@section("footer")
@parent
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'content_auction', {
height: 300,
filebrowserUploadUrl: "upload.php"
});


$(document).ready(function(){
  function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'_')
        ;
}
  $("#title").change(function(){
    var slug=convertToSlug($(this).val());

    $('#post_slug').val(slug);

  });
});
</script>

@endsection