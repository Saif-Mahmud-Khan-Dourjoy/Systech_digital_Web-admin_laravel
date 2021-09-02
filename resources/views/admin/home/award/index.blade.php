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

<div class="text-center"><h4>Recognition,Award,Concern,Member</h4></div>


<div>
    <a href="{{url('/home_awards/create')}}" class="btn btn-primary d-inline-block">Add+</a>
</div>

<br>


<div class="container px-5 ">
    <div class="text-center"><h5>Recognition</h5></div>
     <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Link</th>
        
            <th scope="col">OPT</th>
            </tr>
        </thead>
        <tbody>
            @foreach($homeRecognition as $homeRecognition)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
               <td><img src="{{$homeRecognition->image}}" style="height:50px;width: 50px;"></td>
               <td>{{$homeRecognition->link}}</td>
                <td>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('home_recognitions.show',$homeRecognition->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li>
                            <li><a class="dropdown-item" href="{{url('/home_recognitions/'.$homeRecognition->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li>
                            <!-- <li>
                               <form action="{{ route('home_recognitions.destroy', $homeRecognition->id)}}" method="post">
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
    <br>
    <hr>
    <br>
        <div class="text-center"><h5>Award</h5></div>
     <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">HeadText</th>
        
            <th scope="col">OPT</th>
            </tr>
        </thead>
        <tbody>
            @isset($homeAward)

            <tr>
                <th scope="row">1</th>
               <td>
                
                <img src="{{asset($homeAward->image)}}" style="height:50px;width: 50px;">

               </td>
               <td>{{$homeAward->head_text}}</td>
                <td>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('home_awards.show',$homeAward->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li>
                            <li><a class="dropdown-item" href="{{url('/home_awards/'.$homeAward->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li>
                            <!-- <li>
                               <form action="{{ route('home_awards.destroy', $homeAward->id)}}" method="post">
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
    <br>
    <hr>
    <br>
        <div class="text-center"><h5>Concern</h5></div>
     <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">HeadLine</th>
        
            <th scope="col">OPT</th>
            </tr>
        </thead>
        <tbody>
               @isset($homeConcern)
            <tr>
                <th scope="row">1</th>
               <td><img src="{{asset($homeConcern->concern_image->first()->image)}}" style="height:50px"></td>
               <td>{{$homeConcern->headline}}</td>
                <td>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('home_concerns.show',$homeConcern->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li>
                            <!-- <li><a class="dropdown-item" href="{{url('/home_concerns/'.$homeConcern->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li> -->
                            <!-- <li>
                               <form action="{{ route('home_concerns.destroy', $homeConcern->id)}}" method="post">
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

        <br>
    <hr>
    <br>
        <div class="text-center"><h5>Member</h5></div>
     <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">HeadLine</th>
        
            <th scope="col">OPT</th>
            </tr>
        </thead>
        <tbody>
            @isset($homeMember)
            <tr>
                <th scope="row">1</th>
               <td><img src="{{asset($homeMember->member_image->first()->image)}}" style="height:50px"></td>
               <td>{{$homeMember->headline}}</td>
                <td>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('home_members.show',$homeMember->id)}}"><i class="far fa-eye-slash text-warning"></i> View</a></li>
                           <!--  <li><a class="dropdown-item" href="{{url('/home_members/'.$homeMember->id.'/edit')}}"><i class="fas fa-edit text-success"></i> Edit</a></li> -->
                            <!-- <li>
                               <form action="{{ route('home_members.destroy', $homeMember->id)}}" method="post">
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


@endsection