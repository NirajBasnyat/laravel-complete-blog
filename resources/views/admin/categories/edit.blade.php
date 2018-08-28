@extends('layouts.app')

@section('content')
	@include('inc.messages');
	<div class="card bg-primary">
		<div class="card-header"><div class="lead">Update Category</div></div>
		<div class="card-body">
			<form action="{{route('category.update',['id'=>$category->id])}}"  method="POST">
				{{csrf_field()}}
				<div class="form-group">
					<input type="text" name="name" class="form-control mb-2" value="{{$category->name}}">
					<input type="submit" value="Submit" class="btn btn-dark">
				</div>
			</form>
		</div>
@endsection