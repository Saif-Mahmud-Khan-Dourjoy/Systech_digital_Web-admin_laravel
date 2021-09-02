<div class="col-md-4 mt-4 text-end">
	<div class="form-group">
		<img src="{{asset($com_head->signature)}}" style="height: 100px;">
	</div> 
</div>



<div class="col-md-4 mt-4">
	<div class="form-group">
		<label class="" for="signature">Head Signature:</label>
		<input type="file" name="signature" class="form-control" value="" id="signature">
	</div> 
</div>

<div class="col-md-6 mt-4">
	<div class="form-group">
		<label class="" for="name">Head Name:</label>
		<input type="text" name="name" class="form-control" value="{{$com_head->name}}" id="name">
	</div> 
</div>
<div class="col-md-6 mt-4">
	<div class="form-group">
		<label class="" for="designation">Head Designation:</label>
		<input type="text" name="designation" class="form-control" value="{{$com_head->designation}}" id="designation">
	</div> 
</div>