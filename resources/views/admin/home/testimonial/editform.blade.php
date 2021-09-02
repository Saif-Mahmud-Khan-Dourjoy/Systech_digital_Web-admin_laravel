          <div class="col-md-4 text-end">
          	<div class="form-group">
          		<img src="{{asset($testimonial->image)}}" style="height:100px">
          	</div> 
          </div>

          <div class="col-md-6 ">
          	<div class="form-group">
          		<label class="" for="image">Image:</label>
          		<input type="file" name="image" class="form-control" value="" id="image">
          	</div> 
          </div>


        <div class="col-md-8 mx-auto ">
          <div class="row"> 
          <div class="col-md-6 ">
          	<div class="form-group">
          		<label class="" for="name">Name:</label>
          		<input type="text" name="name" class="form-control" value="{{$testimonial->name}}" id="name">
          	</div> 
          </div>
          <div class="col-md-6">
          	<div class="form-group">
          		<label class="" for="designation">Designation:</label>
          		<input type="text" name="designation" class="form-control" value="{{$testimonial->designation}}" id="designation">
          	</div> 
          </div>
          </div>
          </div>
          <div class="col-md-8 mx-auto ">
          	<div class="form-group">
          		<label class="" for="text">Text:</label>

          		<textarea name="text" class="form-control" value="" id="text">{{$testimonial->text}}</textarea>
          	</div> 
          </div>
