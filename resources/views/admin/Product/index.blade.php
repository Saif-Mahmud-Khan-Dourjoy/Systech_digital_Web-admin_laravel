@extends('admin.layout.master')

@section('title')
  Systech - Product
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
<div>
    <!-- include('admin.layouts.flash_message') -->
</div>
<div>
    <a href="{{ route('products.create')}}" class="btn btn-primary d-inline-block">Add+</a>
</div>
<br>
<br>
<div>
    <div>
      @include('layouts.flash_message')
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Code</th>
            <th scope="col">Status</th>
            <th scope="col">OPT</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($products as $product)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $product->product_name}}</td>
                <td>{{ $product->product_code}}</td>
                <td>Active</td>
                <td>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('products.show', $product->id) }}"><i class="fas fa-eye text-success"></i> View</a></li>
                            <li>
                                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button class="dropdown-item border-none" onclick="return confirm('Are you sure you want to delete this item?');" type="submit"><i class="fas fa-trash-alt text-danger"></i> Delete</button>
                                </form>
                            </li>
                        </ul>
                        <!-- <a class="dropdown-item" href="#"><i class="fas fa-trash-alt text-danger"></i> Delete</a> -->
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