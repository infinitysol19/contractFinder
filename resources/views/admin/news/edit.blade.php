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
    <h1 class="h3 mb-0 text-gray-800"> Edit News</h1>
       <a href="{{ route('getallnews_admin') }}" class="btn-primary btn btn-sm shadow-lg border-0">Go Back</a>
  </div>
  <div class="card shadow mb-4">
    
    <div class="card-body">
 
      <form method="POST" action="{{ route('updatenews_admin') }}" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="post_type" value="news">

         <input type="hidden" name="author" value="{{ $news->author }}">
         

        <input type="hidden" name="news_id" value='{{ Crypt::encrypt($news->id) }}'>
        <div class="form-group">
          <div class="form-group"><label for="username"><strong>Title</strong></label>
          <input class="form-control" type="text" placeholder="abc...." name="title" id="title" value="{{ $news->title }}">
        </div>
      </div>
         <div class="form-group">
          <div class="form-group"><label for="username"><strong>Slug</strong></label>
         <input type="text" name="slug"  class="form-control"  placeholder="abc-test-1" id="post_slug" value="{{ $news->slug }}">
        </div>
      </div>
      <div class="form-group">
        <div class="form-group"><label for="username"><strong>Content</strong></label>
        <textarea name="description" rows="4" id="content_auction" cols="50" class="form-control">{{ $news->description }}</textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group"><label for="username"><strong>Feature Image</strong></label>
      <input class="form-control" type="file" name="featured_img" accept="image/*">

     <img src="{{ asset('/frontend/images/') }}/{{ $news->featured_img  }}" class="img-thumbnail" width="150">
       <input type="hidden" name="hidden_image" value="{{ $news->featured_img  }}" />
    </div>
  </div>
 

   <div class="form-group">
      <div class="form-group"><label for="username"><strong>Created Date</strong></label>
      <input class="form-control datetimepicker" type="text" name="create_datetime" id="date_timepicker_start" value="{{$news->create_datetime}}">
    </div>
  </div>


       <div class="form-group">
          <div class="form-group"><label for="username"><strong>Organization Name</strong></label>
          <input class="form-control" type="text" placeholder="abc...." name="org_name" id="org_name" value="{{ $news->org_name }}">
        </div>
      </div>

 

    <div class="form-group">
      <div class="form-group"><label for="username"><strong>Status</strong></label>
    <select name="status" class="form-control">

      @if ($news->status=='on')
      <option value="on" selected="">Active</option>
      <option value="off">Deactive</option>
      @else
       <option value="on">Active</option>
      <option value="off" selected="">Deactive</option>
      @endif
     
   
    </select>
    </div>
  </div>
  <div class="form-group"><button class=" custompostionbtn btn btn-success btn-sm shadow-lg border border-success" type="submit">Update Auction</button>
{{--   <a  href="{{ route('auction_dashboard') }}" class="btn btn-light btn-lg shadow-lg border border-dark" type="submit">Go Back To All Auction</a> --}}</div>
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