<div class="row border section2-content p-2 pb-4 mb-4 big-form">
 
  <div class="col-12">
    <div class="form-group">
      <label class="" for="product_description_headline">Product Description Headline:</label>
      <input type="text" name="product_description_headline" class="form-control" value="{{ $productDescription->product_description_headline }}" id="product_description_headline">
    </div> 
  </div>

  <div class="col-12">
    <div class="form-group">
      <label class="" for="product_description_text">Product Description Text</label>
      <textarea name="product_description_text" class="form-control" id="product_description_text" rows="4">{{ $productDescription->product_description_text }}</textarea>
    </div> 
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="" for="product_description_video">Product Descriptionm Video:</label>
      <input type="file" name="product_description_video" class="form-control" value="" id="product_description_video">
    </div> 
  </div>

  <div class="col-12">
    <div class="form-group">
      <label class="" for="request_for_demo_button_link">Request For Demo Button Link:</label>
      <input type="text" name="request_for_demo_button_link" class="form-control" value="{{ $productDescription->request_for_demo_button_link }}" id="request_for_demo_button_link">
    </div> 
  </div>

  <div class="col-12">
    <div class="form-group">
      <label class="" for="download_brochure_button_link">Download Brochure Button Link:</label>
      <input type="text" name="download_brochure_button_link" class="form-control" value="{{ $productDescription->download_brochure_button_link }}" id="download_brochure_button_link">
    </div> 
  </div>
</div>