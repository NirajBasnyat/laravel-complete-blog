@extends('layouts.app')

@section('content')
	@include('inc.messages');
	<div class="card bg-primary">
		<div class="card-header"><div class="lead">Create User</div></div>
		<div class="card-body">
			<form action="{{route('user.store')}}"  method="POST">
				{{csrf_field()}}
				<div class="form-group">
					
					<label class="lead">Name</label>
					<input type="text" name="name" class="form-control mb-2">

					<label class="lead">Email</label>
					<input type="email" name="email" class="form-control mb-2">

					<input type="submit" value="Create" class="btn btn-dark">
				</div>
			</form>
		</div>
	</div>
@endsection