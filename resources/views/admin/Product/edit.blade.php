@extends('admin.layout.master')

@section('title')
  Systech - Product Update
@endsection

@section('style')
  .bg-form{
    background-color:#ccffcc;
    border-radius: 8px;
  }
  .big-form{
    background-color:aliceblue;
    border-radius: 12px;
  }
 tr{
     border: 1px solid black;
 }
 
 
  
@endsection


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product</li>
    </ol>
</div>
<hr>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-10 mx-auto p-4 border" style="background-color: #f2f2f2;">
        <div class="panel-heading pt-3" >
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="row p-2">
            <div class="col-12">
                <h3 class="title" align="center">Product Information</h3>
            </div>
        </div>

        

      
        @include('admin.product.form_update')

        

    </div>
  </div>
</div>



@endsection