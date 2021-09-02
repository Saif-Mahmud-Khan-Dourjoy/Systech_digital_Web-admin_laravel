@extends('admin.layout.master')
@section('title')
Systech - Testimonial
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Home</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Testimonial</li>
  </ol>
</div>
<hr>



<div class="container">
  <div class="row">
       <div class="col-md-10 col-sm-10 mx-auto p-4 border" style="background-color: #f2f2f2;">
      <div class="panel-heading " >
        <h3 class="title" align="center">Statistic Form</h3>
        <hr>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
            <hr>
        @endif

      </div>
    <div class="col-md-10 col-sm-12 mx-auto p-4 ">

     <div class="col-12 mt-4 d-inline-block">
  <p class="d-inline-block" style="font-size: 20px; font-weight: bold;">Testimonial</p>
  <span class="d-inline-block testimonial_add"><i class="d-inline-block fas fa-plus-circle fa-2x text-success "></i></span>
  <span class="d-inline-block testimonial_remove"><i class="d-inline-block fas fa-minus-circle fa-2x text-danger"></i></span>
</div>
   <div class="border p-4">
      <form class="form-inline" action="{{url('/home_testimonials')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row testimonial_content">
          @include('admin.home.testimonial.form')
          </div>
            <div class="py-3 text-center">
            <button class="mx-1 btn btn-dark">Cancel</button>
            <button type="submit" class="mx-1 btn btn-primary">Submit</button> 
          </div>
          
        </form>
        </div>
      </div>
    </div>
  </div>
  </div>
<script type="text/javascript">
        $('.testimonial_add').click(function(){
       var bhtml = '<div class="row testimonial "><div class="col-md-6 "><div class="form-group"><label class="" for="name">Name:</label><input type="text" name="name[]" class="form-control" value="" id="name"></div> </div><div class="col-md-6 "><div class="form-group"><label class="" for="designation">Designation:</label><input type="text" name="designation[]" class="form-control" value="" id="designation"></div></div><div class="col-md-6 "><div class="form-group"><label class="" for="text">Text:</label><textarea name="text[]" class="form-control" value="" id="text"></textarea></div></div><div class="col-md-6 "><div class="form-group"><label class="" for="Image">Image:</label><input type="file" name="image[]" class="form-control" value="" id="Image"></div> </div></div>';
        $('.testimonial_content').append(bhtml); 
       
      });
      $('.testimonial_remove').click(function(){
        $('.testimonial:last').remove();
      });
</script>
@endsection