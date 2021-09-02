@extends('admin.layout.master')

@section('title')
  Systech - Product View
@endsection

@section('style')
  .bg-form{
    background-color:#ccffcc;
    border-radius: 8px;
  }
  .big-form{
    background-color:aliceblue;
    border-radius: 12px;
    border:1px solid black!important;
    box-shadow: 2px 4px 8px #888888;
  }
 tr{
     border: 1px solid black;
 }
 
 
  
@endsection


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product</li>
    </ol>
</div>
<hr>
<br>
<br>
<div class="container">
  <div class="row">
    <div>
      @include('layouts.flash_message')
    </div>
    <div class="col-md-10 col-sm-10 mx-auto p-4 border" style="background-color: #f2f2f2;">
        <div class="panel-heading pt-3" >
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="row p-2">
          <div class="col-12">
              <h3 class="title" align="center">Product Information</h3>
          </div>
        </div>

        

      
        @include('admin.product.view_content')

        

    </div>
  </div>
</div>






<script type="text/javascript">
  $(document).ready(function(){
    $('.point_add').click(function(){
      var bhtml = '<div class="col-12 my-1 point"><div class="form-group"><input type="text" name="point[]" placeholder="Point" class="form-control" value="" id="point"></div> </div>';
      $('.point_content').append(bhtml); 
    });
    $('.point_remove').click(function(){
      $('.point:last').remove();
    });

    $('.product_photo_add').click(function(){
      var bhtml = '<div class="col-12 product_photo my-2"> <div class="form-group"> <input type="file" name="product_photo[]" class="form-control" value="" id="product_photo"> </div> </div>';
      $('.product_photo_content').append(bhtml); 
    });
    $('.product_photo_remove').click(function(){
      $('.product_photo:last').remove();
    });
  });
</script>
@endsection
