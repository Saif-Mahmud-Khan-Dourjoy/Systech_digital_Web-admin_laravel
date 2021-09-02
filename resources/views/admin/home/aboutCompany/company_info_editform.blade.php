
					<hr style="height:3px" class="text-info mb-5">
					
                   <div class="col-md-6">
						<div class="form-group text-end">
							<video  class=""  width="250" autoplay muted style="margin:0;">
							<source src="{{asset($com_info->video)}}">	
							</video>
						</div> 
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="" for="video">Video:</label>
							<input type="file" name="video" class="form-control" value="" id="video">
						</div> 
					</div>
					<div class="col-md-6 mt-4">
						<div class="form-group">
							<label class="" for="headline">Headline:</label>
							<input type="text" name="headline" class="form-control" value="{{$com_info->headline}}" id="headline" >
						</div> 
					</div>
					<div class="col-md-6 mb-5 mt-4">
						<div class="form-group">
							<label class="" for="description">Description:</label>
							<textarea name="description" class="form-control" value="" id="description">{{$com_info->description}}</textarea> 
						</div> 
					</div>