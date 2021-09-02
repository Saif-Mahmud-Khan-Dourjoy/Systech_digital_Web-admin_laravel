@extends('admin.layout.master')
@section('title')
Systech - Product Feature
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Home</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product Feature</li>
  </ol>
</div>
<hr>



<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-10 mx-auto p-4 border" style="background-color: #f2f2f2;">
      <div class="panel-heading " >
        <h3 class="title" align="center">Product Feature Form</h3>
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
    </div>
    <div class="col-md-10 col-sm-12 mx-auto p-4 ">

     <div class="col-12 mt-4 d-inline-block">
  <p class="d-inline-block" style="font-size: 20px; font-weight: bold;">Product Feature</p>
  <span class="d-inline-block Product_feature_add"><i class="d-inline-block fas fa-plus-circle fa-2x text-success "></i></span>
  <span class="d-inline-block Product_feature_remove"><i class="d-inline-block fas fa-minus-circle fa-2x text-danger"></i></span>
</div>
   <div class="border p-4">

      <form class="form-inline" action="{{url('/home_product_features')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row Product_feature_content">
           
        @include('admin.home.productfeatures.form')
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
        $('.Product_feature_add').click(function(){
       var bhtml = '<div class="row feature "><div class="col-md-4 "><div class="form-group"><label class="" for="head_text">Head Text:</label><input type="text" name="head_text[]" class="form-control" value="" id="head_text"></div> </div><div class="col-md-4 "><div class="form-group"><label class="" for="sub_text">Sub text:</label><input type="text" name="sub_text[]" class="form-control" value="" id="sub_text"></div></div><div class="col-md-4 "><div class="form-group"><label class="" for="icon">Icon:</label><input type="file" name="icon[]" class="form-control" value="" id="icon"></div> </div></div>';
        $('.Product_feature_content').append(bhtml); 
       
      });
      $('.Product_feature_remove').click(function(){
        $('.feature:last').remove();
      });
</script>
@endsection

