@extends('layouts.post')
@section('content')

@section('nav_btn')
<li class="btn btn-sm btn-light text-dark px-2 py-0"><a class="nav-link " href="{{route('add')}}">Add New</a></li>
@endsection

	<div class="row">
	  <div class="col-md-12">
		<h3 class="h5 mb-4 text-center">All Posts</h3>
			<div class="table-wrap">
				<table class="table">
					<thead class="thead-primary text-center">
						<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Title</th>
						<th>Tag</th>
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

