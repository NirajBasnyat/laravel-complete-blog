@extends('layouts.app')

@section('content')
	<table class="table table-striped">
		<tr>
			<th>Tags</th>
			<th></th>
			<th></th>
		</tr>
		@if(count($tags)>0)
			@foreach($tags as $tag)
			<tr>
				<td>{{$tag->tag}}</td>
				<td><a href="{{route('tag.edit',['id' => $tag->id])}}" class="btn btn-info">Edit</a></td>
				<td><a href="{{route('tag.delete',['id' => $tag->id])}}" class="btn btn-danger">Delete</a></td>
			</tr>
			@endforeach
		@else
			<tr>
				<td colspan="5" class="text-center">No Tags to show</td>
			</tr>
		@endif
	</table>
@endsection