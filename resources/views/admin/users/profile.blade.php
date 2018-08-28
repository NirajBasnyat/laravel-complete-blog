@extends('layouts.app')

@section('content')
	@include('inc.messages');
	<div class="card bg-primary">
		<div class="card-header"><div class="lead">Update profile</div></div>
		<div class="card-body">
			<form action="{{route('user.profile.update')}}"  method="POST">
				{{csrf_field()}}
				<div class="form-group">
					
					<label>Username</label>
					<input type="text" name="name" class="form-control mb-2" value="{{$user->name}}">

					<label>Email</label>
					<input type="email" name="email" class="form-control mb-2" value="{{$user->email}}">

					<label class="lead">New password</label>
					<input type="password" name="password" class="form-control mb-2">

					<label class="lead">Facebook</label>
					<input type="text" name="facebook" class="form-control mb-2" value="{{$user->profile->facebook}}">

					<label class="lead">Youtube</label>
					<input type="text" name="youtube" class="form-control mb-2" value="{{$user->profile->youtube}}">

					<label class="lead">About</label>
					<textarea name="about" cols="6" rows="3" class="form-control mb-2">{{$user->profile->about}}</textarea>

					<input type="submit" value="Update profile" class="btn btn-dark">
				</div>
			</form>
		</div>
	</div>
@endsection