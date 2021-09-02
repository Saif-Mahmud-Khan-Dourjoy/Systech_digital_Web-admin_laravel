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
<div class="container">
    <h3 class="text-center">
        News
    </h3>
    <hr class="text-info mb-5" style="height:3px">
      
    <div class="card col-md-5 mx-auto p-5" >
 <center class="mb-3"> <img src="{{asset($major_clients->image)}}" class="card-img-top" style="width: 50%;" alt=""></center>
  <div class="card-body">
    <h5 class="card-title mb-3"><span class="text-success">Link: </span>{{$major_clients->link}}</h5>
    
   
  </div>
</div>
     
   
    
</div>

@endsection