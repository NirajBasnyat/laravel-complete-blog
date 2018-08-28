@extends('layouts.app')

@section('content')
	@include('inc.messages');
	<div class="card bg-primary">
		<div class="card-header"><div class="lead">Update settings</div></div>
		<div class="card-body">
			<form action="{{route('setting.update')}}"  method="POST">
				{{csrf_field()}}
				<div class="form-group">
					
					<label>Sitename</label>
					<input type="text" name="site_name" class="form-control mb-2" value="{{$setting->site_name}}">

					<label class="lead">Contact</label>
					<input type="text" name="contact_number" class="form-control mb-2" value="{{$setting->contact_number}}">

					<label class="lead">Email</label>
					<input type="text" name="contact_email" class="form-control mb-2" value="{{$setting->contact_email}}">

					<label class="lead">Address</label>
					<input type="text" name="address" class="form-control mb-2" value="{{$setting->address}}">

					<input type="submit" value="Update profile" class="btn btn-dark">
				</div>
			</form>
		</div>
	</div>
@endsection