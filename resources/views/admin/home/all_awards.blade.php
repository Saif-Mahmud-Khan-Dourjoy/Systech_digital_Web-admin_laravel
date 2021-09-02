@extends('admin.layout.master')
@section('title')
Systech - Home About Company
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Home</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">About Company</li>
	</ol>
</div>
<hr>


<div class="container">
	<div class="row">
		<div class="col-md-10 col-sm-12 mx-auto p-4 border">
           
			<form class="form-inline" action="">
				  
				<div class="row">
                  <h4 class="text-center">Add Recognitions</h4>
                  <hr>

					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="link">Link:</label>
							<input type="text" name="link[]" class="form-control" value="" id="link">
						</div> 
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="image">Image:</label>
							<input type="file" name="image[]" class="form-control" value="" id="image">
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="link">Link:</label>
							<input type="text" name="link[]" class="form-control" value="" id="link">
						</div> 
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="image">Image:</label>
							<input type="file" name="image[]" class="form-control" value="" id="image">
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="link">Link:</label>
							<input type="text" name="link[]" class="form-control" value="" id="link">
						</div> 
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="image">Image:</label>
							<input type="file" name="image[]" class="form-control" value="" id="image">
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="link">Link:</label>
							<input type="text" name="link[]" class="form-control" value="" id="link">
						</div> 
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="image">Image:</label>
							<input type="file" name="image[]" class="form-control" value="" id="image">
						</div> 
					</div>
				    <br>
				    <br>
				    <br>
				    <br>
				    <h4 class="text-center">Add Awards</h4>
					<hr>
				
					<div class="col-md-6 mt-4">
						<div class="form-group">
							<label class="" for="head_text">Head Text:</label>
							<input type="text" name="head_text" class="form-control" value="" id="head_text">
						</div> 
					</div>
					<div class="col-md-6 mt-4">
						<div class="form-group">
							<label class="" for="sub_text">Sub text:</label>
							<input type="text" name="sub_text" class="form-control" value="" id="sub_text">
						</div> 
					</div>


					<div class="col-md-8 mx-auto mb-5">
						<div class="form-group">
							<label class="" for="award_image">Image:</label>
							<input type="file" name="award_image" class="form-control" value="" id="award_image">
						</div> 
					</div>
                  <br>
				    <br>
				    <br>
				    <br>
				    <h4 class="text-center">Add Concern</h4>
					<hr>
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="concern_headline">Headline:</label>
							<input type="text" name="concern_headline" class="form-control" value="" id="concern_headline">
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="concern_text">Text:</label>
							<input type="concern_text" name="concern_text" class="form-control" value="" id="concern_text">
						</div> 
					</div>


					<div class="col-md-8 mx-auto mb-5">
						<div class="form-group">
							<label class="" for="concern_image">Image:</label>
							<input type="file" name="concern_image[]" class="form-control" value="" id="concern_image" multiple>
						</div> 
					</div>
					    <br>
				    <br>
				    <br>
				    <br>
				    <h4 class="text-center">Add Member</h4>
					<hr>
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="member_headline">Headline:</label>
							<input type="text" name="member_headline" class="form-control" value="" id="member_headline">
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="member_text">Text:</label>
							<input type="member_text" name="member_text" class="form-control" value="" id="member_text">
						</div> 
					</div>


					<div class="col-md-8 mx-auto mb-5">
						<div class="form-group">
							<label class="" for="member_image">Image:</label>
							<input type="file" name="member_image[]" class="form-control" value="" id="member_image" multiple>
						</div> 
					</div>
					
				
					
					
					


					

					<div class="py-3 text-center">
						<button class="mx-1 btn btn-dark">Cancel</button>
						<button type="submit" class="mx-1 btn btn-primary">Submit</button> 
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



@endsection