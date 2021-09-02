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
<div>
    <a href="{{url('/home_testimonials/create')}}" class="btn btn-primary d-inline-block">Add+</a>
</div>
<br>
<br>
<div>
    <div class="my-3 text-center">
        <h4>Testimonials</h4>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Designation</th>
            <th scope="col">OPT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonials)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{asset($testimonials->image)}}" style="height:100px; width: 100px;"></td>
                <td>{{$testimonials->name}}</td>
                <td>{{$testimonials->designation}}</td>
                <td>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('home_testimonials.show',$testimonials->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li>
                            <li><a class="dropdown-item" href="{{url('/home_testimonials/'.$testimonials->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li>
                            <li>
                               <form action="{{ route('home_testimonials.destroy', $testimonials->id)}}" method="post">
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
</div>

<div class="row">

</div>

@endsection