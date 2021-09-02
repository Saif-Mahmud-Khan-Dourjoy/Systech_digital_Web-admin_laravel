@extends('admin.layout.master')

@section('title')
Systech - Home
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Home</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="./">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Home</li>
	</ol>
</div>
<hr>
<div>
	@include('layouts.flash_message')
</div>
<!-- @if(is_null($aboutCompany) && is_null($companyHead)) -->
<div>
	<a href="{{url('/about_company/create')}}" class="btn btn-primary d-inline-block">Add+</a>
</div>
<!-- @endif -->
<br>
<br>
<div>
	 <div class="text-center mb-3">
	 	<h5>Company Infomation</h5>
	 </div>
	<table class="table table-striped mb-5">
		<thead>
			<tr>
                <th scope="col">#</th>
				<th scope="col" style="width:300px">Video</th>
				<th scope="col">HeadLine</th>
				<!-- <th scope="col">Description</th> -->
				<th scope="col">OPT</th>
			</tr>
		</thead>
		<tbody>
           @isset($aboutCompany)
			<tr>
                <th>1</th>
				<td><button class="btn btn-warning watch_button"><i class="far fa-plus-square plus " style="transition: 1s;"></i> <i class="far fa-minus-square minus" style="display:none;transition: 1s;"></i></button>
					

					</td>
					<td>{{$aboutCompany->headline}}</td> 
					<!-- <td style="max-width: 400px"><p >{{$aboutCompany->description}}</p></td> -->
					<td>

						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
								Action
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
								<li><a class="dropdown-item" href="{{route('about_company.show',$aboutCompany->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li>
								<li><a class="dropdown-item" href="{{url('/about_company/'.$aboutCompany->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li>
								<!-- <li>
									<form action="{{ route('about_company.destroy', $aboutCompany->id)}}" method="post">
										{{ csrf_field() }}
										@method('DELETE')
										<button class="dropdown-item border-none" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i> Delete</button>
									</form>
								</li> -->
							</ul>
						</div>
					</td>
				</tr>
				<tr class="bg-white video" style="display:none; overflow: hidden; " >
						<td colspan="4">
							<video  class=""  width="250" autoplay muted style="margin:0;">
							<source src="{{asset($aboutCompany->video)}}">	
							</video>
						</td>
					</tr>
			  @endisset		
			</tbody>
		</table>

		<div class="text-center mb-3">
	 	<h5>Company Sub Information</h5>
	 </div>
	<table class="table table-striped mb-5">
		<thead>
			<tr>

				 <th scope="col">#</th>
				<th scope="col">Icon</th>
				<th scope="col">Head Text</th>
				<!-- <th scope="col">Sub Text</th> -->
				<th scope="col">OPT</th>
			</tr>
		</thead>
		<tbody>
                @foreach($companySubSection as $c_s)
			   <tr>

				<th scope="row">{{ $loop->iteration }}</th>
					
                 <td><img src="{{asset($c_s->icon)}}" style="height:100px; width: 100px;"></td>
					</td>
					<td>{{$c_s->head_text}}</td> 
					<!-- <td><p>{{$c_s->sub_text}}</p></td> -->
					<td>

						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
								Action
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
								<li><a class="dropdown-item" href="{{route('company_sub_section.show',$c_s->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li>
								<li><a class="dropdown-item" href="{{url('/company_sub_section/'.$c_s->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li>
								<!-- <li>
									<form action="{{ route('company_sub_section.destroy', $c_s->id)}}" method="post">
										{{ csrf_field() }}
										@method('DELETE')
										<button class="dropdown-item border-none" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i> Delete</button>
									</form>
								</li> -->
							</ul>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

			 <div class="text-center mb-3">
	 	<h5>Company Head Information</h5>
	 </div>
	<table class="table table-striped mb-5">
		<thead>
			<tr>
                <th scope="col">#</th>
				<th scope="col" >Signature</th>
				<th scope="col">Name</th>
				<th scope="col">Designation</th>
				<th scope="col">OPT</th>
			</tr>
		</thead>
		<tbody>
              @isset($companyHead)
			<tr>

				 <th>1</th>
					
                 <td><img src="{{asset($companyHead->signature)}}" style="height:100px; width: 100px;"></td>
					

					</td>
					<td>{{$companyHead->name}}</td> 
					<td>{{$companyHead->designation}}</td>
					<td>

						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
								Action
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
								<li><a class="dropdown-item" href="{{route('company_head.show',$aboutCompany->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li>
								<li><a class="dropdown-item" href="{{url('/company_head/'.$aboutCompany->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li>
								<!-- <li>
									<form action="{{ route('company_head.destroy', $companyHead->id)}}" method="post">
										{{ csrf_field() }}
										@method('DELETE')
										<button class="dropdown-item border-none" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i> Delete</button>
									</form>
								</li> -->
							</ul>
						</div>
					</td>
				</tr>
				@endisset	
			</tbody>
		</table>
	</div>

	<script type="text/javascript">
	 $(document).ready(function(){	
		$('.plus').click(function() { 

			$('.plus').hide();
			$('.minus').show();
			$('.video').show();


		});
		$('.minus').click(function() { 

			$('.plus').show();
			$('.minus').hide();
			$('.video').hide();


		});
	});
	</script>

	@endsection