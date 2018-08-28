@extends('layouts.app')

@section('content')
	<table class="table table-striped">
		<tr>
			<th>Categories</th>
			<th></th>
			<th></th>
		</tr>
		@if(count($categories)>0)
			@foreach($categories as $category)
			<tr>
				<td>{{$category->name}}</td>
				<td><a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-info">Edit</a></td>
				<td><a href="{{route('category.delete',['id' => $category->id])}}" class="btn btn-danger">Delete</a></td>
			</tr>
			@endforeach
		@else
			<tr>
				<td colspan="5" class="text-center">No categories to show</td>
			</tr>
		@endif
	</table>
@endsection