@extends('layouts.app')

@section('content')
	@include('inc.messages');
	<div class="card bg-primary">
		<div class="card-header"><div class="lead">Create Tag</div></div>
		<div class="card-body">
			<form action="{{route('tag.store')}}"  method="POST">
				{{csrf_field()}}
				<div class="form-group">
					<input type="text" name="tag" class="form-control mb-2">
					<input type="submit" value="Create" class="btn btn-dark">
				</div>
			</form>
		</div>
	</div>
@endsection