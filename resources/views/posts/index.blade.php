@extends('layouts.post')
@section('content')

@section('nav_btn')
<li class="btn btn-sm btn-light text-dark px-2 py-0"><a class="nav-link " href="{{route('add')}}">Add New</a></li>
@endsection

	<div class="row">
	  <div class="col-md-12">
		<h3 class="h5 mb-4 text-center">All Posts</h3>
		@if($massege = Session::get('status'))
			<div class="alert alert-primary text-center">
				{{$massege}}
			</div>
		@endif
			<div class="table-wrap">
				<table class="table">
					<thead class="thead-primary text-center">
						<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Title</th>
						<th>Tag</th>
						<th colspan="3">Action</th>
						</tr>
					</thead>

					 @if($post)
					<tbody>
					@foreach($post as $data)
						<tr class="alert text-center" role="alert">
						<td>{{++$i}}</td>
						<td><img class="image" src="{{asset('uploads/'.$data->image)}}" alt="{{$data->image}}"></td>
						<td>{{$data->title}}
						<br>		
						<span>{{ Str::words($data->details, 15, $end='.....') }}</span></td>
						<td>{{$data->tag}}</td>
						<td><a class="btn btn-sm btn-primary" href="{{route('show',$data->id)}}">Show</a></td>
						<td><a class="btn btn-sm btn-warning" href="{{route('edit',$data->id)}}">Edit</a></td>
						<td><a class="btn btn-sm btn-danger" href="{{route('delete',$data->id)}}"  onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
						</tr>
					@endforeach
					</tbody>
					@endif
					</table>

					<div class="d-flex">
						<div class="m-auto">
							{!! $post->links() !!}
						</div>
					</div>
			</div>
	  </div>
	</div>
		
	

	@endsection

