@extends('layouts.app')

@section('content')
	<table class="table table-striped">
		<tr>
			<th class="lead">Posts</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
		
		@if(count($posts) > 0)
			@foreach($posts as $post)
			<tr>
				<td>{{$post->title}}</td>
				<td><img src="/storage/uploads/posts/{{$post->featured}}" alt="{{$post->title}}" width="90px" height="40px"></td>
				<td><a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-info btn-sm">Edit</a></td>
				<td><a href="{{route('post.delete',['id'=>$post->id])}}" class="btn btn-danger btn-sm">Trash</a></td>
			</tr>
			@endforeach
		@else
			<tr>
				<td colspan="5" class="text-center">No Published Post</td>
			</tr>

		@endif




			
	</table>
@endsection