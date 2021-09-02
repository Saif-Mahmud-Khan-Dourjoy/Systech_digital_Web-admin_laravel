<div class="row">
    <h4>{{ $productPackage->package_name }}</h4>
    <div class="col-12 mt-4 d-inline-block">
      <p class="d-inline-block">Package Point</p>
      <span class="d-inline-block pacage_point_add"><i class="d-inline-block fas fa-plus-circle fa-2x text-success "></i></span>
      <span class="d-inline-block pacage_point_remove"><i class="d-inline-block fas fa-minus-circle fa-2x text-danger"></i></span>
    </div>
    <div class="row pacage_content mx-auto">
      <div class="col-md-8 mx-auto">
        <div class="form-group">
          <input type="text" name="package_point[]" class="form-control" value="" id="pacage_point">
        </div> 
      </div>
    </div>
</div>