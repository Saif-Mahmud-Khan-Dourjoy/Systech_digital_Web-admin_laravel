<div class="row mb-4">
  <div class="col-md-6">
    <div class="form-group">
      <label class="" for="product_name">Product Name:</label>
      <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" id="product_name">
    </div> 
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="" for="product_code">Product Code:</label>
      <input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}" id="product_code">
    </div> 
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="" for="description">Description:</label>
      <textarea name="description" class="form-control" id="description" rows="3">{{ $product->description }}</textarea>
    </div> 
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <img src="{{ $product->product_image }}" alt="">
      <label class="" for="product_image">Product Image:</label>
      <input type="file" name="product_image" class="form-control" value="" id="product_image">
    </div> 
  </div>

</div>