@extends('admin.layout.master')

@section('title')
  Systech - Product
@endsection

@section('style')
  .bg-form{
    background-color:#ccffcc;
    border-radius: 8px;
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
    <div class="col-md-10 col-sm-10 mx-auto p-4 border" style="background-color: #f2f2f2;">
      <div class="panel-heading pt-3" >
        <h3 class="title" align="center">Product Information Form</h3>
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

      <form class="form-inline my-5"  method="post" action="{{url('/products')}}" enctype="multipart/form-data">
        @csrf
        @include('admin.product.form1')

        <div class="py-3 text-center">
          <a href="{{ url()->previous() }}" class="mx-1 btn btn-dark">Cancel</a>
          <button type="submit" class="mx-1 btn btn-primary">Submit</button> 
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){

    $('.point_add').click(function(){
      var bhtml = '<div class="col-6 my-1 point"><div class="form-group"><input type="text" name="point[]" placeholder="Point" class="form-control" value="" id="point"></div> </div>';
      $('.point_content').append(bhtml); 
    });
    $('.point_remove').click(function(){
      $('.point:last').remove();
    });

    $('.product_photo_add').click(function(){
      var bhtml = '<div class="col-6 product_photo my-2"> <div class="form-group"> <input type="file" name="product_photo[]" class="form-control" value="" id="product_photo"> </div> </div>';
      $('.product_photo_content').append(bhtml); 
    });
    $('.product_photo_remove').click(function(){
      $('.product_photo:last').remove();
    });

    $('.feature_add').click(function(){
      var bhtml = '<div class="col-md-6 my-2 feature"><div class="border bg-form p-2 py-4"> <div class="form-group"><label class="" for="feature_icon">Feature Icon:</label><input type="file" name="feature_icon[]" class="form-control" value="" id="feature_icon"></div>  <div class="form-group"><label class="" for="feature_headtext">Feature Headtext:</label><input type="text" name="feature_headtext[]" class="form-control" value="" id="feature_headtext"> </div> <div class="form-group"><label class="" for="feature_subtext">Feature Subtext:</label><textarea name="feature_subtext[]" class="form-control" value="" id="feature_subtext" rows="2"></textarea> </div></div> </div>';
      $('.feature_content').append(bhtml); 
    });
    $('.feature_remove').click(function(){
      $('.feature:last').remove();
    });

    $('.strength_add').click(function(){
      var bhtml = '<div class="col-md-6 my-2 strength"><div class="border bg-form p-2 py-4">  <div class="form-group"> <label class="" for="strength_icon">Strength Icon:</label> <input type="file" name="strength_icon[]" class="form-control" value="" id="strength_icon"> </div>  <div class="form-group"><label class="" for="strength_headtext">Strength Headtext:</label> <input type="text" name="strength_headtext[]" class="form-control" value="" id="strength_headtext"> </div><div class="form-group"><label class="" for="strength_subtext">Strength Subtext:</label> <textarea name="strength_subtext[]" class="form-control" value="" id="strength_subtext" rows="4"></textarea></div> </div> </div>';
      $('.strength_content').append(bhtml); 
    });
    $('.strength_remove').click(function(){
      $('.strength:last').remove();
    });



    $('.pacage_point_add').click(function(){
      var bhtml = '<div class="col-12 pacage_point py-1"><input type="text" name="package_point[]" class="d-inline-block form-control"  value="" id="pacage_point"></div>';
      $('.pacage_content').append(bhtml); 
    });
    $('.pacage_point_remove').click(function(){
      $('.pacage_point:last').remove();
    });


    $('.testimonial_add').click(function(){
      var bhtml = '<div class="col-md-6 testimonial  my-1  p-2"> <div class="border bg-form p-2 py-4">  <div class="form-group"> <label class="" for="client_image">Client Image:</label><input type="file" name="client_image[]" class="form-control" value="" id="client_image"> </div> <div class="form-group"> <label class="" for="client_comment">Client Comment	:</label> <textarea name="client_comment[]" class="form-control" value="" id="client_comment" rows="4"></textarea> </div> <div class="form-group"> <label class="" for="client_name">Client Name:</label> <input type="text" name="client_name[]" class="form-control" value="" id="client_name">  </div> <div class="form-group"> <label class="" for="client_designation">Client Designation:</label> <input type="text" name="client_designation[]" class="form-control" value="" id="client_designation"></div></div></div>';
      $('.testimonial_content').append(bhtml); 
    });
    $('.testimonial_remove').click(function(){
      $('.testimonial:last').remove();
    });


    $('.client_add').click(function(){
      var bhtml = '<div class="col-md-4 py-2 clients"><div class="border bg-form p-2 py-4"><div class="form-group"> <label class="" for="client_company_logo">Client Image:(Company Logo)</label> <input type="file" name="client_company_logo[]" class="form-control" value="" id="client_company_logo"> </div>   <div class="form-group"> <label class="" for="client_link">Client Link:</label><input type="text" name="client_link[]" class="form-control" value="" id="client_link"> </div></div></div>';
      $('.client_content').append(bhtml); 
    });
    $('.client_remove').click(function(){
      $('.clients:last').remove();
    });
    
  });
</script>
@endsection