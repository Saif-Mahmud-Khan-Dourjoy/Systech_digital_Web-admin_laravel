@extends('admin.layout.master')
@section('title')
Systech - Client
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Home</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Client</li>
  </ol>
</div>
<hr>



<div class="container">
  <div class="row">
  	  <div class="col-md-10 col-sm-10 mx-auto p-4 border" style="background-color: #f2f2f2;">
      <div class="panel-heading " >
        <h3 class="title" align="center">Client Form</h3>
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
      <p class="d-inline-block" style="font-size: 20px; font-weight: bold;">Client</p>
      <span class="d-inline-block client_add"><i class="d-inline-block fas fa-plus-circle fa-2x text-success "></i></span>
      <span class="d-inline-block client_remove"><i class="d-inline-block fas fa-minus-circle fa-2x text-danger"></i></span>
    </div>
    <div class="border p-4">
     <form class="form-inline " action="{{url('/home_clients')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row client_content">
            @include('admin.home.client.form')
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
<script type="text/javascript">
  $('.client_add').click(function(){
   var bhtml = '<div class="row client "><div class="col-md-8 mx-auto "><div class="form-group"><label class="" for="client_name">Client Name:</label><input type="text" name="client_name[]" class="form-control" value="" id="client_name"></div> </div></div></div>';
   $('.client_content').append(bhtml); 
   
 });
  $('.client_remove').click(function(){
    $('.client:last').remove();
  });
</script>
@endsection
