 <div class="col-md-4 text-end">
 	<div class="form-group">
 		<img src="{{asset($news->image)}}" style="height:100px" >
 	</div> 
 </div>
<div class="col-md-4 ">
 	<div class="form-group">
 		<label class="" for="image">Image:</label>
 		<input type="file" name="image" class="form-control" value="" id="image">
 	</div> 
 </div>
 <div class="col-md-6 ">
 	<div class="form-group">
 		<label class="" for="headline">Headline:</label>
 		<input type="text" name="headline" class="form-control" value="{{$news->headline}}" id="headline">
 	</div> 
 </div>
 <div class="col-md-6 ">
 	<div class="form-group">
 		<label class="" for="sub_text">Sub text:</label>
 		<input type="text" name="sub_text" class="form-control" value="{{$news->sub_text}}" id="sub_text">
 	</div> 
 </div>
