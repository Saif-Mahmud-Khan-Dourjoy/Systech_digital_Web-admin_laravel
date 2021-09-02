<div class="row section1-content mb-4">
  <div class="col-md-6">
    <div class="form-group">
      <label class="" for="background_image">Background Image:</label>
      <input type="file" name="background_image" class="form-control" value="" id="background_image">
    </div> 
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="" for="product_icon">Product Icon:</label>
      <input type="file" name="product_icon" class="form-control" value="" id="product_icon">
    </div> 
  </div>
  <div class="col-12">
    <div class="form-group">
      <label class="" for="banner_headline">Banner Headline:</label>
      <input type="text" name="banner_headline" class="form-control" value="{{ $productBanner->banner_headline }}" id="banner_headline">
    </div> 
  </div>

  <div class="col-md-12">
    <div class="form-group">
      <label class="" for="banner_text">Banner Text:</label>
      <textarea name="banner_text" class="form-control"  id="banner_text" rows="3">{{ $productBanner->banner_text }}</textarea>
    </div> 
  </div>

  <div class="col-12">
    <div class="form-group">
      <label class="" for="button1_text">Button1 Text:</label>
      <input type="text" name="button1_text" class="form-control" value="{{ $productBanner->button1_text }}" id="button1_text">
    </div> 
  </div>
  <div class="col-12">
    <div class="form-group">
      <label class="" for="button1_link">Button1 Link:</label>
      <input type="text" name="button1_link" class="form-control" value="{{ $productBanner->button1_link }}" id="button1_link">
    </div> 
  </div>
  <div class="col-12">
    <div class="form-group">
      <label class="" for="button2_text">Button2 Text:</label>
      <input type="text" name="button2_text" class="form-control" value="{{ $productBanner->button2_text }}" id="button2_text">
    </div> 
  </div>
  <div class="col-12">
    <div class="form-group">
      <label class="" for="button2_link">Button2 Link:</label>
      <input type="text" name="button2_link" class="form-control" value="{{ $productBanner->button2_link }}" id="button2_link">
    </div> 
  </div>


</div>