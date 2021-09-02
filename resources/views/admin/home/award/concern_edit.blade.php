@extends('admin.layout.master')
@section('title')
Systech - Concern
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Home</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Concern</li>
	</ol>
</div>
<hr>


<div class="container">
	<div class="row">
		<div class="col-md-10 col-sm-12 mx-auto p-4 border">
			<div class="col-md-10 col-sm-10 mx-auto p-4 border" style="background-color: #f2f2f2;">
				<div class="panel-heading " >
					<h3 class="title" align="center">Concern Form</h3>
					<hr>
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li> {{ $error }} </li>
							@endforeach
						</ul>
					</div>
					<hr>
					@endif

				</div>

				<form class="form-inline" action="{{url('/home_concerns/'.$concern->id)}}" method="post" enctype="multipart/form-data">
					{{ method_field('PUT') }}
					@csrf


					<div class="row">




						@include('admin.home.award.concern_editform')



						<div class="py-3 text-center">
							<button class="mx-1 btn btn-dark">Cancel</button>
							<button type="submit" class="mx-1 btn btn-primary">Update</button> 
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>



	@endsection