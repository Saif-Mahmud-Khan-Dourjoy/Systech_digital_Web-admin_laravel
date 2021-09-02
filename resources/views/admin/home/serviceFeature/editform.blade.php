 <div class="col-md-4 text-end">
  <div class="form-group">
   <img src="{{asset($serviceFeature->icon)}}" style="height:100px">
  </div> 
</div>
 <div class="col-md-4 ">
  <div class="form-group">
    <label class="" for="icon">Icon:</label>
    <input type="file" name="icon" class="form-control" value="" id="icon">
  </div> 
</div>
 <div class="col-md-6 ">
  <div class="form-group">
    <label class="" for="head_text">Head Text:</label>
    <input type="text" name="head_text" class="form-control" value="{{$serviceFeature->head_text}}" id="head_text">
  </div> 
</div>
<div class="col-md-6 ">
  <div class="form-group">
    <label class="" for="sub_text">Sub text:</label>
    <input type="text" name="sub_text" class="form-control" value="{{$serviceFeature->sub_text}}" id="sub_text">
  </div> 
</div>
