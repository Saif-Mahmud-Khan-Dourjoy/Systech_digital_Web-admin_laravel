
<div class="row p-2 border big-form">
    <div class="col-12 text-end">
        <a class="text-end" href="{{ route('products.edit', $product->id) }}"><i class="fas fa-edit text-success"></i></a>
    </div>
    <center><img  style="height:150px;" src="{{ asset($product->product_image) }}" alt="Product Image"></center>
    <table class="my-3 p-1 bg-light">
        <thead>
            <tr>
                <td class="p-2">Product Name: <b>{{ $product->product_name }}</b></td>
                <td class="p-2">Product Code : <b>{{ $product->product_code }}</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2" class="p-2">
                    <p>Product Description:</p>
                    <p>{{ $product->description }}</p>
                </td>
            </tr>  
        </tbody>
    </table>
</div>  

<div class="mt-2 mb-2 section1">
    <div class="row bg-info text-white">
        <div class="col-12 text-start"><span class="">Section - 1</span></div>
    </div>  
</div>

<div class="row p-2 border big-form">
    <div class="col-12 text-end">
        <a class="text-end" href="{{ route('product_banners.edit', $product->product_banner->id) }}"><i class="fas fa-edit text-success"></i></a>
    </div>
    <div class="row section1-content mb-4">
        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="background_image">Background Image:</label><br>
                <img style="width:80%;" src="{{ asset($product->product_banner->background_image) }}" alt="Background Image">
            </div> 
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="" for="product_icon">Product Icon:</label><br>
                <img style="width:200px;" src="{{ asset($product->product_banner->product_icon) }}" alt="Product Icon">
            </div> 
        </div>
        <div class="col-12">
            <div class="form-group">
            <label class="" for="banner_headline">Banner Headline:</label>
            <input disabled type="text" name="banner_headline" class="form-control" value="{{ $product->product_banner->banner_headline }}" id="banner_headline">
            </div> 
        </div>

        <div class="col-md-12">
            <div class="form-group">
            <label class="" for="banner_text">Banner Text:</label>
            <textarea name="banner_text" class="form-control" value="" id="banner_text" rows="3">{{ $product->product_banner->banner_text }}</textarea>
            </div> 
        </div>

        <div class="col-12">
            <div class="form-group">
            <label class="" for="button1_text">Button1 Text:</label>
            <input type="text" name="button1_text" class="form-control" value="{{ $product->product_banner->button1_text }}" id="button1_text">
            </div> 
        </div>
        <div class="col-12">
            <div class="form-group">
            <label class="" for="button1_link">Button1 Link:</label>
            <input type="text" name="button1_link" class="form-control" value="{{ $product->product_banner->button1_link }}" id="button1_link">
            </div> 
        </div>
        <div class="col-12">
            <div class="form-group">
            <label class="" for="button2_text">Button2 Text:</label>
            <input type="text" name="button2_text" class="form-control" value="{{ $product->product_banner->button2_text }}" id="button2_text">
            </div> 
        </div>
        <div class="col-12">
            <div class="form-group">
            <label class="" for="button2_link">Button2 Link:</label>
            <input type="text" name="button2_link" class="form-control" value="{{ $product->product_banner->button2_link }}" id="button2_link">
            </div> 
        </div>


    </div>

</div>

<div class="mt-2 mb-2 section2">
    <div class="row bg-info text-white">
        <div class="col-12 text-start"><span class="">Section - 2</span></div>
    </div>  
</div>

<div class="row border section2-content p-2 pb-4 mb-4 big-form">
  <div class="col-12 text-end">
      <a class="text-end" href="{{ route('product_descriptions.edit', $product->product_description->id) }}"><i class="fas fa-edit text-success"></i></a>
  </div>
  <div class="col-12">
    <div class="form-group">
      <label class="" for="product_description_headline">Product Description Headline:</label>
      <input type="text" name="product_description_headline" class="form-control" value="{{ $product->product_description->product_description_headline }}" id="product_description_headline">
    </div> 
  </div>

  <div class="col-12">
    <div class="form-group">
      <label class="" for="product_description_text">Product Description Text</label>
      <textarea name="product_description_text" class="form-control" id="product_description_text" rows="4">{{ $product->product_description->product_description_text }}</textarea>
    </div> 
  </div>

  <div class="col-md-12">
    <div class="form-group">
      <label class="" for="product_description_video">Product Descriptionm Video:</label>
      <center>
        <video width="220px;" controls>
          <source src="{{ asset($product->product_description->product_description_video) }}" type="video/mp4">
        </video>  
      </center>
      
    </div> 
  </div>

  <div class="col-12">
    <div class="form-group">
      <label class="" for="request_for_demo_button_link">Request For Demo Button Link:</label>
      <input type="text" name="request_for_demo_button_link" class="form-control" value="{{ $product->product_description->request_for_demo_button_link }}" id="request_for_demo_button_link">
    </div> 
  </div>

  <div class="col-12">
    <div class="form-group">
      <label class="" for="download_brochure_button_link">Download Brochure Button Link:</label>
      <input type="text" name="download_brochure_button_link" class="form-control" value="{{ $product->product_description->download_brochure_button_link }}" id="download_brochure_button_link">
    </div> 
  </div>
</div>

<div class="row border p-2 big-form">
    
    <div class="col-8"><p class="">Product Description Point</p></div>
    <div class="col-4 text-end"><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#point1" data-bs-whatever="@getbootstrap">Add More</button></div>
  
  
  <div class="row ">
    @foreach($product->product_description->product_description_point as $d_point)
    <div class="col-8 my-1">
      <div class="form-group">
        <input type="text" name="point" placeholder="Point" class="form-control" value="{{ $d_point->point }}" id="point">
      </div> 
    </div>
    <div class="col-4 my-1">
      <a class="text-end d-inline-block" href="{{ route('product_description_points.edit', $d_point->id) }}"><i class="fas fa-edit text-success"></i></a>
      <form class="d-inline-block"  action="{{ route('product_description_points.destroy', $d_point->id)}}" method="post">
        {{ csrf_field() }}
        @method('DELETE')
        <button class="dropdown-item border-none d-inline-block" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
      </form>
    </div>
    @endforeach
  </div>
</div>




<div class="modal fade" id="point1" tabindex="-1" aria-labelledby="pointModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pointModalLabel">Add More Point</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-inline"  method="post" action="{{url('/product_description_points')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="product_description_id" value="{{ $product->product_description->id }}" class="form-control" id="recipient-name">
          <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" id="recipient-name">

          <div class="row point_content py-2">
            <div class="col-12 mt-4 d-inline-block">
              <p class="d-inline-block">Product Description Point</p>*
              <span class="d-inline-block point_add"><i class="d-inline-block fas fa-plus-circle fa-2x text-success "></i></span>
              <span class="d-inline-block point_remove"><i class="d-inline-block fas fa-minus-circle fa-2x text-danger"></i></span>
            </div>
            <div class="col-12 my-1">
              <div class="form-group">
                <input type="text" name="point[]" placeholder="Point" class="form-control" value="" id="point">
              </div> 
            </div>
          </div>
          <center><button type="submit" class="btn btn-primary">Submit</button> </center>

         
        </form>
      </div>

    </div>
  </div>
</div>


<div class="mt-2 mb-2 section2">
    <div class="row bg-info text-white">
        <div class="col-12 text-start"><span class="">Section - 3</span></div>
    </div>  
</div>

<div class="row p-2 border section3-content mb-4">
   
  <div class="col-12 text-center py-2">
    <h3>Product Statistics</h3>
  </div>

  @foreach($product->product_statistic as $statistic)
  <div class="col-md-4">
    <div class="border bg-form p-2 pb-3 bg-form">
        <div class="row text-end">
            <a class="text-end" href="{{ route('product_statistics.edit', $statistic->id) }}"><i class="fas fa-edit text-success"></i></a>
        </div>
        
      <div class="form-group my-3">
        <center>
          <label class="" for="statistic_icon">Statistic Icon:</label><br>
          <img style="height:70px;" src="{{ asset($statistic->statistic_icon) }}" alt="">
        </center> 
      </div> 
      <div class="form-group">
        <label class="" for="statistic_number">Statistic Number:</label>
        <input type="text" name="statistic_number" class="form-control" value="{{ $statistic->statistic_number }}" id="statistic_number">
      </div>
      <div class="form-group">
        <label class="" for="statistic_text">Statistic Text:</label>
        <input type="text" name="statistic_text" class="form-control" value="{{ $statistic->statistic_text }}" id="statistic_text">
      </div>
    </div>
  </div>
  @endforeach

</div>

<div class="mt-2 mb-2 section2">
    <div class="row bg-info text-white">
        <div class="col-12 text-start"><span class="">Section - 4</span></div>
    </div>  
</div>


<div class="row section4-content mb-4">
  <div class="col-12 text-center py-2">
    <h5>ALL FEATURES</h5>
  </div>
  <label class="" for="feature_headline">Feature Headline:</label>
  <div class="col-10">
    <div class="form-group">
      
      <input type="text" name="	feature_headline" class="form-control" value="{{ $product->product_all_feature->feature_headline }}" id="feature_headline">
    </div> 
  </div>
  <div class="col-2"><a class="btn" href="{{ route('product_all_features.edit', $product->product_all_feature->id) }}"><i class="fas fa-edit text-success"></i></a></div>
</div>

<div class="row my-3 border p-2 big-form">
  <div class="col-8"><p class="">Product Photo</p></div>
  <div class="col-4 text-end"><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#product_photo1" data-bs-whatever="@getbootstrap">Add More</button></div>
  @foreach($product->product_all_feature->product_image as $p_photo)
  <div class="col-6 border mt-4 p-2">
    <form class="d-inline-block"  action="{{ route('product_images.destroy', $p_photo->id)}}" method="post">
      {{ csrf_field() }}
      @method('DELETE')
      <button class="dropdown-item border-none d-inline-block" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
    </form>
    <img src="{{ asset($p_photo->product_photo) }}" alt="Product Photo" style="width:100%">

  </div>
  @endforeach
</div>
<!-- Start Modal product_photo -->
<div class="modal fade" id="product_photo1" tabindex="-1" aria-labelledby="pointModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pointModalLabel">Add More Images</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-inline"  method="post" action="{{url('/product_images')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" id="recipient-name">
          <input type="hidden" name="product_all_feature_id" value="{{ $product->product_all_feature->id }}" class="form-control" id="recipient-name">
          <div class="row d-inline-block">
            <p class="d-inline">Product Photo<span class="d-inline-block product_photo_add"><i class="d-inline-block fas fa-plus-circle fa-2x text-success "></i></span><span class="d-inline-block product_photo_remove"><i class="d-inline-block fas fa-minus-circle fa-2x text-danger"></i></span></p>
          </div>
          
          <div class="row product_photo_content">
            <div class="col-12 my-2">
              <div class="form-group">
                <input type="file" name="product_photo[]" class="form-control" value="" id="product_photo">
              </div> 
            </div>
          </div>
          <center><button type="submit" class="btn btn-primary">Submit</button> </center>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal product_photo -->
<div class="row border p-1 big-form">

  <div class="col-8"><p class="">Product Feature</p></div>
  <div class="col-4 text-end"><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#product_feature1" data-bs-whatever="@getbootstrap">Add More</button></div>
 
  <div class="row">
    @foreach($product->product_all_feature->product_feature as $pf)
    <div class="col-md-6 my-2">
      <div class="border bg-form p-2 py-2"> 
        <div class="form-group text-end">
          <a href="{{ route('product_features.edit', $pf->id) }}"><i class="fas fa-edit text-success"></i></a>
          <form class="d-inline-block"  action="{{ route('product_features.destroy', $pf->id)}}" method="post">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="dropdown-item border-none d-inline-block" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
          </form>
        </div> 
        <div class="form-group">
          <label class="" for="feature_icon">Feature Icon:</label>
          <img style="height:90px;" src="{{ asset($pf->feature_icon) }}" alt="icon">
        </div> 
        <div class="form-group">
          <label class="" for="feature_headtext">Feature Headtext:</label>
          <input type="text" name="feature_headtext" class="form-control" value="{{ $pf->feature_headtext }}" id="feature_headtext">
        </div>
        <div class="form-group">
          <label class="" for="feature_subtext">Feature Subtext:</label>
          <textarea name="feature_subtext" class="form-control"  id="feature_subtext" rows="2">{{ $pf->feature_subtext }}</textarea>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>
<!-- Start Modal product_feature -->
<div class="modal fade" id="product_feature1" tabindex="-1" aria-labelledby="pointModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pointModalLabel">Add Feature</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-inline"  method="post" action="{{url('/product_features')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" id="recipient-name">
          <input type="hidden" name="product_all_feature_id" value="{{ $product->product_all_feature->id }}" class="form-control" id="recipient-name">
          <div class="row my-2">
            <div class="col-md-10 mx-auto my-1">
              <div class="form-group">
                  <label class="" for="feature_icon">Feature Icon:</label>*
                  <input type="file" name="feature_icon" class="form-control"  id="feature_icon">
              </div> 
              <div class="form-group">
                  <label class="" for="feature_headtext">Feature Headtext:</label>*
                  <input type="text" name="feature_headtext" class="form-control" value="" id="feature_headtext">
              </div>
              <div class="form-group">
                  <label class="" for="feature_subtext">Feature Subtext:</label>*
                  <textarea name="feature_subtext" class="form-control"  id="feature_subtext" rows="2"></textarea>
              </div>
            </div>
          </div>
          <center><button type="submit" class="btn btn-primary">Submit</button> </center>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal product_feature -->

<div class="mt-2 mb-2 section2">
    <div class="row bg-info text-white">
        <div class="col-12 text-start"><span class="">Section - 5</span></div>
    </div>  
</div>

<div class="row py-2 text-center">
  <h5>OUR STRENGTH</h5>
</div>
<div class="row border p-2 section5-content mb-4 big-form">
  <div class="col-12 text-end"><a href="{{ route('product_our_strength.edit',$product->product_our_strength->id) }}"><i class="fas fa-edit text-success"></i></a></div>
  
  <div class="col-12">
    <div class="form-group">
      <label class="" for="strength_headline">Strength Headline:</label>
      <input type="text" name="	strength_headline" class="form-control" value="{{ $product->product_our_strength->strength_headline }}" id="	strength_headline">
    </div> 
  </div>
  <div class="col-12">
    <div class="form-group">
      <label class="" for="strength_text">Strength Text:</label>
      <textarea name="strength_text" class="form-control"  id="strength_text" rows="4">{{ $product->product_our_strength->strength_text }}</textarea>
    </div> 
  </div>
</div>

<div class="row p-2 border big-form">
  <div class="col-8"><p class="">Strength</p></div>
  <div class="col-4 text-end"><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#product_strength1" data-bs-whatever="@getbootstrap">Add More</button></div>
  @foreach($product->product_our_strength->product_strength as $ps)
  <div class="col-md-6 p-2 my-2">
    <div class="border bg-form p-2 py-4"> 
      <div class="form-group text-end">
        <a href="{{ route('product_strength.edit',$ps->id) }}"><i class="fas fa-edit text-success"></i></a>
        <form class="d-inline-block"  action="{{ route('product_strength.destroy', $ps->id)}}" method="post">
          {{ csrf_field() }}
          @method('DELETE')
          <button class="dropdown-item border-none d-inline-block" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
        </form>
      </div>
      <div class="form-group">
        <label class="" for="strength_icon">Strength Icon:</label>
        <img style="height:100px;" src="{{ asset($ps->strength_icon) }}" alt="">
      </div> 
      <div class="form-group">
        <label class="" for="strength_headtext">Strength Headtext:</label>
        <input type="text" name="strength_headtext" class="form-control" value="{{ $ps->strength_headtext }}" id="strength_headtext">
      </div>
      <div class="form-group">
        <label class="" for="strength_subtext">Strength Subtext:</label>
        <textarea name="strength_subtext" class="form-control"  id="strength_subtext" rows="4">{{ $ps->strength_subtext }}</textarea>
      </div>
    </div>
  </div>
  @endforeach

  
</div>
<!-- Start Modal product_strength -->
<div class="modal fade" id="product_strength1" tabindex="-1" aria-labelledby="pointModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pointModalLabel">Add Strength</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-inline"  method="post" action="{{url('/product_strength')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" id="recipient-name">
          <input type="hidden" name="product_our_strength_id" value="{{ $product->product_our_strength->id }}" class="form-control" id="recipient-name">
          <div class="row my-2">
          <div class="col-md-10 my-1 mx-auto">
            <div class=" p-2 py-4"> 
              <div class="form-group">
                <label class="" for="strength_icon">Strength Icon:</label>*
                <input type="file" name="strength_icon" class="form-control" value="" id="strength_icon">
              </div> 
              <div class="form-group">
                <label class="" for="strength_headtext">Strength Headtext:</label>*
                <input type="text" name="strength_headtext" class="form-control" value="" id="strength_headtext">
              </div>
              <div class="form-group">
                <label class="" for="strength_subtext">Strength Subtext:</label>*
                <textarea name="strength_subtext" class="form-control" value="" id="strength_subtext" rows="4"></textarea>
              </div>
              
            </div>
          </div>
          </div>
          <center><button type="submit" class="btn btn-primary">Submit</button> </center>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal product_strength -->

<div class="mt-2 mb-2 section6">
  <div class="row bg-info text-white">
    <div class="col-12 text-start"><span class="">Section - 6</span></div>
  </div>  
</div>
<div class="row py-2 text-center">
  <h5>PRICING PLAN</h5>
  <h3>Choose Your Favorable Packages</h3>
</div>

<div class="row border p-2 my-2 big-form">
  <div class="col-12 text-end"><a href="{{ route('product_pricing_plans.edit',$product->product_pricing_plan->id) }}"><i class="fas fa-edit text-success"></i></a></div>
  <div class="col-12">
    <div class="form-group">
      <label class="" for="custom_package_button_link">Custom Package Button Link:</label>
      <input type="text" name="	custom_package_button_link" class="form-control" value="{{ $product->product_pricing_plan->custom_package_button_link }}" id="	custom_package_button_link">
    </div> 
  </div>

  <div class="col-12">
    <div class="form-group">
      <label class="" for="contact_for_price_button_link">Contact For Price Button Link:</label>
      <input type="text" name="	contact_for_price_button_link" class="form-control" value="{{ $product->product_pricing_plan->contact_for_price_button_link }}" id="	contact_for_price_button_link">
    </div> 
  </div>
</div>

@foreach($product->product_package as $pp )
<div class="row my-4">
  <div class="col-md-10 col-lg-9 mx-auto rounded-3 shadow p-4 mb-5">

      <form class="d-inline-block"   action="{{ route('product_packages.destroy', $pp->id)}}" method="post">
        {{ csrf_field() }}
        @method('DELETE')
        <button class="dropdown-item border-none d-inline-block" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
      </form>  

    
      
    <div class="text-center">
      <h4>{{ $pp->package_name }}  <a href="{{ route('product_packages.edit',$pp->id) }}"><i class="fas fa-edit text-success"></i></a></h4>
      @if($pp->package_status == 1) <small>(Highlited)</small>  @else <small>(Not Highlited)</small>  @endif 
    </div>
    
    <div class="row my-4 ">
      <div class="col-8"><p class="d-inline-block">Package Point</p> <a  class=" btn btn-primary ms-2" href="{{ route('product_package.addPoint',$pp->id)}}">+</a></div>
    </div>
    @foreach($pp->product_package_point as $ppp)
    <div class="row ">
      <div class="col-9">
        <div class="form-group">
          <input type="text" name="package_point" class="form-control" value="{{ $ppp->package_point }}" id="package_point">
        </div>
      </div>
      <div class="col-3">
        <a href="{{ route('product_package_points.edit',$ppp->id) }}"><i class="fas fa-edit text-success"></i></a>
        <form class="d-inline-block"  action="{{ route('product_package_points.destroy', $ppp->id)}}" method="post">
          {{ csrf_field() }}
          @method('DELETE')
          <button class="dropdown-item border-none d-inline-block" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
        </form>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endforeach

<div class="col-12 text-center"><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#product_package1" data-bs-whatever="@getbootstrap">Add More Package</button></div>
<!-- Start Modal product_strength -->
<div class="modal fade" id="product_package1" tabindex="-1" aria-labelledby="pointModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pointModalLabel">Add Package</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-inline"  method="post" action="{{url('/product_packages')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" id="recipient-name">
          <div class="row my-2">
          <div class="row">
            <div class="row ">
                <div class="col-md-8 mx-auto">
                    <div class="form-group">
                    <label class="" for="pacage_name">Package Name:</label>*
                    <input type="text" name="package_name" class="form-control" value="" id="pacage_name">
                    </div> 
                </div>
            </div>
            <div class="col-12 mt-4 d-inline-block">
                <p class="d-inline-block">Package Point</p>
                <span class="d-inline-block package_point_add"><i class="d-inline-block fas fa-plus-circle fa-2x text-success "></i></span>
                <span class="d-inline-block package_point_remove"><i class="d-inline-block fas fa-minus-circle fa-2x text-danger"></i></span>
            </div>
            <div class="row pacage_content">
                <div class="col-md-12 mx-auto">
                    <div class="form-group">
                    <input type="text" name="package_point[]" class="form-control" value="" id="pacage_point">
                    </div> 
                </div>
            </div>
            
            </div>
            <script type="text/javascript">
            $(document).ready(function(){

            $('.package_point_add').click(function(){
              var bhtml = '<div class="col-md-12 mx-auto pacage_point py-1"><input type="text" name="package_point[]" class="d-inline-block form-control"  value="" id="pacage_point"></div>';
              $('.pacage_content').append(bhtml); 
            });
            $('.package_point_remove').click(function(){
              $('.pacage_point:last').remove();
            });

            });
            </script>
          </div>
          <center><button type="submit" class="btn btn-primary">Submit</button> </center>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal product_strength -->
<div class="mt-2 mb-2 section2">
  <div class="row bg-info text-white">
    <div class="col-12 text-start"><span class="">Section - 7</span></div>
  </div>  
</div>
<div class="row py-2 text-center">
  <h5>TESTIMONIALS</h5>
  <h3>Our Respected Clients</h3>
</div>


<div class="row p-2 border big-form">
  <div class="col-8"><p class="">Testimonial</p></div>
  

  <div class="col-4 text-end"><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#product_testimonial1" data-bs-whatever="@getbootstrap">Add More</button></div>

  <div class="row testimonial_content mt-2"> 
    @foreach($product->product_testimonial as $pt)
    <div class="col-md-6  my-1  p-2">
      <div class="border bg-form p-2 py-4"> 
        <div class="form-group text-end">
          <a href="{{ route('product_testimonials.edit',$pt->id) }}"><i class="fas fa-edit text-success"></i></a>
          <form class="d-inline-block"  action="{{ route('product_testimonials.destroy', $pt->id)}}" method="post">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="dropdown-item border-none d-inline-block" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
          </form>
        </div>
        <div class="form-group">
          <label class="" for="client_image">Client Image:</label>
          <img style="height:170px;" src="{{ asset($pt->client_image) }}" alt="Client Image">
        </div> 
        <div class="form-group">
          <label class="" for="client_comment">Client Comment	:</label>
          <textarea name="client_comment" class="form-control"  id="client_comment" rows="4">{{ $pt->client_comment }}</textarea>
        </div>
        <div class="form-group">
          <label class="" for="client_name">Client Name:</label>
          <input type="text" name="client_name" class="form-control" value="{{ $pt->client_name }}" id="client_name">
        </div>
        <div class="form-group">
          <label class="" for="client_designation">Client Designation:</label>
          <input type="text" name="client_designation" class="form-control" value="{{ $pt->client_designation }}" id="client_designation">
        </div>
      </div>
    </div>
    @endforeach
  </div>

</div>

<!-- Start Modal product_strength -->
<div class="modal fade" id="product_testimonial1" tabindex="-1" aria-labelledby="pointModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pointModalLabel">Add Product Testimonial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-inline"  method="post" action="{{url('/product_testimonials')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" id="recipient-name">
          <div class="row my-2">
          <div class="col-md-12  my-1  p-2">
            <div class="p-2 py-4"> 
              <div class="form-group">
                <label class="" for="client_image">Client Image:</label>*
                <input type="file" name="client_image" class="form-control" value="" id="client_image">
              </div> 
              <div class="form-group">
                <label class="" for="client_comment">Client Comment	:</label>*
                <textarea name="client_comment" class="form-control" value="" id="client_comment" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label class="" for="client_name">Client Name:</label>*
                <input type="text" name="client_name" class="form-control" value="" id="client_name">
              </div>
              <div class="form-group">
                <label class="" for="client_designation">Client Designation:</label>*
                <input type="text" name="client_designation" class="form-control" value="" id="client_designation">
              </div>
              </div>
            </div>
          </div>
            
          <center><button type="submit" class="btn btn-primary">Submit</button> </center>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal product_strength -->

<div class="mt-2 mb-2 section8">
    <div class="row bg-info text-white">
        <div class="col-12 text-start"><span class="">Section - 8</span></div>
    </div>  
</div>


<div class="row section4-content mb-4">
  <div class="col-12 text-center py-2">
    <h5>OUR CLIENTS</h5>
  </div>
  <label class="" for="client_headline">Client Headline:</label>
  <div class="col-10">
    <div class="form-group">
      <input type="text" name="	client_headline" class="form-control" value="{{ $product->product_client->client_headline }}" id="client_headline">
    </div> 
  </div>
  <div class="col-2"><a class="btn" href="{{ route('product_clients.edit',$product->product_client->id) }}"><i class="fas fa-edit text-success"></i></a></div>
</div>



<div class="row p-2 border big-form">
  <div class="col-8"><p class="">Client</p></div>
  <div class="col-4 text-end"><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#product_client_image2" data-bs-whatever="@getbootstrap">Add More</button></div>
 
  @foreach($product->product_client_image as $pc)

  <div class="col-md-6 py-2">
    <div class="border bg-form p-2 py-4">
      <div class="form-group text-end">
          <a href="{{ route('product_client_images.edit',$pc->id) }}"><i class="fas fa-edit text-success"></i></a>
          <form class="d-inline-block"  action="{{ route('product_client_images.destroy', $pc->id)}}" method="post">
            {{ csrf_field() }}
            @method('DELETE')
            <button class="dropdown-item border-none d-inline-block" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i></button>
          </form>
      </div>
      <div class="form-group text-center">
        <label class="" for="client_company_logo">Client Image:(Company Logo)</label><br>
        <img style="height:130px;" src="{{ asset($pc->client_company_logo) }}" alt="Company Logo">
      </div> 
      <div class="form-group">
        <label class="" for="client_link">Client Link:</label>
        <input type="text" name="client_link" class="form-control" value="{{ $pc->client_link }}" id="client_link">
      </div>
    </div>
  </div>
  @endforeach

</div>
            
<!-- Start Modal product_client_image -->
<div class="modal fade" id="product_client_image2" tabindex="-1" aria-labelledby="pointModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pointModalLabel">Add Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-inline"  method="post" action="{{url('/product_client_images')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control" id="recipient-name">
          <div class="row ">
            <div class="col-md-12  my-1  p-2">
              <div class="p-2 py-4"> 
                <div class="form-group">
                  <label class="" for="client_company_logo">Client Image:(Company Logo):</label>
                  <input type="file" name="client_company_logo" class="form-control" value="" id="client_company_logo">
                </div>  
              
                <div class="form-group">
                  <label class="" for="client_link">Client Link:</label>*
                  <input type="text" name="client_link" class="form-control" value="" id="statistic_text">
                </div>
                
              </div>
            </div>
          </div>
            
          <center><button type="submit" class="btn btn-primary">Submit</button> </center>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal product_strength -->



<div class="mt-2 mb-2 section9">
    <div class="row bg-info text-white">
        <div class="col-12 text-start"><span class="">Section - 9</span></div>
    </div>  
</div>
<div class="row py-2 text-center">
  <h4>Interested To Buy ?</h4>
</div>

<div class="row p-2 pb-4 border bg-form">
  <div class="col-12 text-end">
    <a href="{{ route('product_buy.edit', $product->product_buy->id)}}"><i class="fas fa-edit text-success"></i></a>
  </div>

  <div class="col-md-6">
    <div class="form-group">
        <label class="" for="sell_headline">Sell Headline:</label>*
        <input type="text" name="sell_headline" class="form-control" value="{{ $product->product_buy->sell_headline }}" id="sell_headline">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
        <label class="" for="sell_button_text">Sell Button Text:</label>*
        <input type="text" name="sell_button_text" class="form-control" value="{{ $product->product_buy->sell_button_text }}" id="sell_button_text">
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
        <label class="" for="sell_text">Sell Text:</label>*
        <input type="text" name="sell_text" class="form-control" value="{{ $product->product_buy->sell_text }}" id="sell_text">
    </div>
  </div>
           
</div>

<br>
