 <div class="col-md-4 text-end ">
	<div class="form-group">
		<img src="{{asset($major_clients->image)}}" style="height:100px">
	</div> 
</div>         
<div class="col-md-6 ">
	<div class="form-group">
		<label class="" for="image">Image:</label>
		<input type="file" name="image" class="form-control" value="" id="image">
	</div> 
</div>
<div class="col-md-8 mx-auto mt-4">
	<div class="form-group">
		<label class="" for="link">Link:</label>
		<input type="text" name="link" class="form-control" value="{{$major_clients->link}}" id="link">
	</div> 
</div>
