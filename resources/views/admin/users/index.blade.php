@extends('layouts.app')

@section('content')
	<table class="table table-striped">
		<tr>
			<th class="lead">User</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
		
		@if(count($users) > 0)
			@foreach($users as $user)
			<tr>
				<td>{{ucfirst($user->name)}}</td>
				{{-- <td><img src="/storage/uploads/avatars/avatar.png" alt="avatar" width="90px" height="40px"></td> --}}
				<td>
					@if ($user->admin) {{-- checks for value of admin in user tables --}}
						@if (Auth::user()->id !== $user->id)
							<a class="btn btn-sm btn-info" href="{{route('user.notadmin',['id'=>$user->id])}}">Remove permission</a>
						@else
							<p class="text-center">Currently logged</p>
						@endif
					@else
						<a class="btn btn-sm btn-success" href="{{route('user.admin',['id' => $user->id]) }}">Make admin</a>
					@endif

				</td>
				<td>
					@if (Auth::user()->id !== $user->id)
						<a class="btn btn-sm btn-danger" href="{{route('user.delete',['id' => $user->id]) }}">Delete</a>
					@endif
					
				</td>
			</tr>
			@endforeach
		@else
			<tr>
				<td colspan="5" class="text-center">No Published Post</td>
			</tr>

		@endif




			
	</table>
@endsection