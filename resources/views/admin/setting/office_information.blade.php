@extends('admin.layout.master')
@section('title')
Systech - Office Information
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Home</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Office Information</li>
  </ol>
</div>
<hr>



<div class="container">
  <div class="row">

    <div class="col-md-10 col-sm-12 mx-auto p-4 ">

     <div class="col-12 mt-4 d-inline-block">
      <p class="d-inline-block" style="font-size: 20px; font-weight: bold;">Office Information</p>
      <span class="d-inline-block office_information_add"><i class="d-inline-block fas fa-plus-circle fa-2x text-success "></i></span>
      <span class="d-inline-block office_information_remove"><i class="d-inline-block fas fa-minus-circle fa-2x text-danger"></i></span>
    </div>
    <div class="border p-4">
      <form class="form-inline office_information_content"  action="">
        <div class="row ">
          <div class="col-md-6 ">
            <div class="form-group">
              <label class="" for="name">Name:</label>
              <input type="text" name="name" class="form-control" value="" id="name">
            </div> 
          </div>
          <div class="col-md-6 ">
            <div class="form-group">
              <label class="" for="location">Location:</label>
              <input type="text" name="location" class="form-control" value="" id="location">
            </div> 
          </div>
          <div class="col-md-6 ">
            <div class="form-group">
              <label class="" for="email">Email:</label>
              <input type="email" name="email" class="form-control" value="" id="email">
            </div> 
          </div>
          <div class="col-md-6 ">
            <div class="form-group">
              <label class="" for="website">Website:</label>
              <input type="text" name="website" class="form-control" value="" id="website">
            </div> 
          </div> 
          <div class="py-3 text-center">
            <button class="mx-1 btn btn-dark">Cancel</button>
            <button type="submit" class="mx-1 btn btn-primary">Submit</button> 
          </div>
        </div>    
      </form>
    </div>
  </div>
</div>
</div>
<script type="text/javascript">
  $('.office_information_add').click(function(){
   var bhtml = '<div class="row office_information "><div class="col-md-6 "><div class="form-group"><label class="" for="name">Name:</label><input type="text" name="name" class="form-control" value="" id="name"></div> </div><div class="col-md-6 "><div class="form-group"><label class="" for="location">Location:</label><input type="text" name="location" class="form-control" value="" id="location"></div></div><div class="col-md-6 "><div class="form-group"><label class="" for="email">Email:</label><input type="email" name="email" class="form-control" value="" id="email"></div></div><div class="col-md-6 "><div class="form-group"><label class="" for="website">Website:</label><input type="file" name="website" class="form-control" value="" id="website"></div> </div></div>';
   $('.office_information_content').append(bhtml); 

 });
  $('.office_information_remove').click(function(){
    $('.office_information:last').remove();
  });
</script>
@endsection

