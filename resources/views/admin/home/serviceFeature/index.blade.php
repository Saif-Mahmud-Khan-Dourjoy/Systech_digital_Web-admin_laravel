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
    <a href="{{url('/service_features/create')}}" class="btn btn-primary d-inline-block">Add+</a>
</div>
<br>
<br>
<div>
   <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Icon</th>
            <th scope="col">Head Text</th>
         <!--    <th scope="col">Sub Text</th> -->
            <th scope="col">OPT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($serviceFeature as $sf)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{asset($sf->icon)}}" style="height:100px; width: 100px;"></td>
                <td>{{$sf->head_text}}</td>
               <!--  <td>{{$sf->sub_text}}</td> -->
                <td>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('service_features.show',$sf->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li>
                            <li><a class="dropdown-item" href="{{url('/service_features/'.$sf->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li>
                            <li>
                               <form action="{{ route('service_features.destroy', $sf->id)}}" method="post">
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


@endsection