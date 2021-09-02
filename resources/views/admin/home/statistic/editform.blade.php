<div class="row">
     <div class="col-md-4 text-end">
		<div class="form-group">
			<img src="{{asset($statistic->icon)}}" style="height:100px">
		</div> 
	</div>
    <div class="col-md-4">
		<div class="form-group">
			<label class="" for="icon">Icon:</label>
			<input type="file" name="icon" class="form-control" value="" id="icon">
		</div> 
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label class="" for="statistic_number">Statistic Number:</label>
			<input type="text" value="{{$statistic->statistic_number}}" name="statistic_number" class="form-control" value="" id="statistic_number">
		</div> 
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label class="" for="statistic_text">Statistic text:</label>
			<input type="text" name="statistic_text" value="{{$statistic->statistic_text}}" class="form-control" value="" id="statistic_text">
		</div> 
	</div>


	
</div>
