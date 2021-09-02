
<div class="col-md-4 mx-auto text-end mb-3">
	<div class="form-group">
		<img src="{{asset($award->image)}}" style="height:100px;width: 100px;">
	</div> 
</div>


<div class="col-md-6 mx-auto mb-3">
	<div class="form-group">
		<label class="" for="award_image">Image:</label>
		<input type="file" name="award_image" class="form-control" value="" id="award_image">
	</div> 
</div>


<div class="col-md-6 mt-6">
	<div class="form-group">
		<label class="" for="head_text">Head Text:</label>
		<input type="text" name="head_text" class="form-control" value="{{$award->head_text}}" id="head_text">
	</div> 
</div>
<div class="col-md-6 mt-6">
	<div class="form-group">
		<label class="" for="sub_text">Sub text:</label>
		<input type="text" name="sub_text" class="form-control" value="{{$award->sub_text}}" id="sub_text">
	</div> 
</div>

