@extends('layouts.app')

@section('content')
	<table class="table table-striped">
		<tr>
			<th class="lead">Trashed posts</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>

		@if(count($posts) > 0)

			@foreach($posts as $post)
			<tr>
				<td>{{$post->title}}</td>
				<td><img src="/storage/uploads/posts/{{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px"></td>
				<td><a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-sm btn-success">Restore</a></td>
				<td><a href="{{route('post.kill',['id'=>$post->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
			</tr>
			@endforeach
		@else
			<tr>
				<td colspan="5" class="text-center">No trashed posts !</td>
			</tr>
		@endif
		
	</table>
@endsection