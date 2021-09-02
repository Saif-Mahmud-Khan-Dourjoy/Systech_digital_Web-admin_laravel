<div class="row">
  <div class="col-8 mx-auto">
    <div class="form-group">
      <label class="" for="package_name">Package Name:</label>*
      <input type="text" name="package_name" class="form-control" value="{{ $productPackage->package_name }}" id="	custom_package_button_link">
    </div> 
  </div>

  <div class="col-8 mx-auto">
    <div class="form-group">
      <label class="" for="package_status">Package Status:</label>
      <select class="form-select" name="package_status" aria-label="Default select example">
        <option @if($productPackage->package_status == 1) selected  @endif  value="1">Highlighted</option>
        <option @if($productPackage->package_status == 0) selected  @endif value="0">Not Highlighted</option>
      </select>
    </div> 
  </div>

 
</div>