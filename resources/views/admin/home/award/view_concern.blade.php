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
<br>
<br>
<div>

 @isset($concern)
 <div class="container">
    <h3 class="text-center">
        Concern 
    </h3>
    <hr class="text-info mb-5" style="height:3px">

    <div class="card col-md-5 mx-auto p-5" >
      <div class="card-body">
        <h5 class="card-title mb-3"><span class="text-success"> Headline: </span>{{$concern->headline}}</h5>

        <h5 class="card-title mb-3"><span class="text-success"> Text: </span>{{$concern->text}}</h5>  
    <div class="text-center">

  

    <a class="dropdown-item" href="{{url('/home_concerns/'.$concern->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a>

   
</div>
    </div>
</div>








<div class="text-center mt-5">
   <h5>Concern Image</h5>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">OPT</th>
        </tr>
    </thead>
    <tbody>
      @foreach($concern->concern_image as $img)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>

        <td><img src="{{asset($img->image)}}" style="height:100px;"></td>

        <td>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <!-- <li><a class="dropdown-item" href="{{route('home_concerns.show',$concern->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li> -->
                    <li><a class="dropdown-item" href="{{url('/home_concern_images/'.$img->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li>
                    <li>
                     <form action="{{ route('home_concern_images.destroy', $img->id)}}" method="post">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="dropdown-item border-none" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i> Delete</button>
                    </form>
                </li>
            </ul>
        </div>
    </td>
</tr>
@endforeach

</tbody>
</table>
@endisset
</div>
</div>


@endsection