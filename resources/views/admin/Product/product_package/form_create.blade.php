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
