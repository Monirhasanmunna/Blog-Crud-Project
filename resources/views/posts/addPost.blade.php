@extends('layouts.post')
@section('content')

@section('nav_btn')
<li class="btn btn-sm btn-light text-dark px-2 py-0"><a class="nav-link " href="{{route('index')}}">Posts</a></li>
@endsection


<div class="row">
    <div class="col-sm-6 col-lg-6 col-s-6  m-auto">
    @if($massege = Session::get('status'))
    <div class="alert alert-primary text-center">{{$massege}}</div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card card-border p-2">
        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <input type="text" class="form-control" id="details" name="details">
            </div>
            <div class="div ">
            <label class="form-check-label mb-1" for="defaultCheck1">Tags</label>
            <div class="form-check">              
                <input class="form-check-input" type="checkbox" value="Film" id="defaultCheck1" name="film">
                <label class="form-check-label" for="defaultCheck1">Film</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Fitness" id="defaultCheck2" name="fitness">
                <label class="form-check-label" for="defaultCheck2">Fitness</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Food" id="defaultCheck2" name="food">
                <label class="form-check-label" for="defaultCheck2">Food</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Gadgets" id="defaultCheck2" name="gadgets">
                <label class="form-check-label" for="defaultCheck2">Gadgets</label>
            </div>
            </div>
            <div class="form-group mb-3">
                <input type="file" class="file-control" id="details" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
    </div>
</div>

@endsection