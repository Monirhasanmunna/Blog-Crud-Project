
@extends('layouts.post')
@section('content')

@section('nav_btn')
<li class="btn btn-sm btn-light text-dark px-2 py-0"><a class="nav-link " href="{{route('add')}}">Add New</a></li>
@endsection


<div class="card m-auto">
      <div class="row">
        <div class="col-sm-5">
          <img class="d-block w-100" src="{{asset('uploads/'.$post->image)}}" alt="$post->image">
        </div>
        <div class="col-sm-7">
          <div class="card-block">
            <!--<h4 class="card-title">Small card</h4> -->
            <div class="card-title">
                <h2>{{$post->title}}</h2>
            </div>
            <p>{{$post->tag}}</p>
            <p>{{$post->details}}</p>
          </div>
        </div>
      </div>
</div>

@endsection