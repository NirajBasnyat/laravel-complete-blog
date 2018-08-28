@extends('layouts.app')

@section('content')
	@include('inc.messages');
	<div class="card bg-primary">
		<div class="card-header"><div class="lead">Upadate Tag</div></div>
		<div class="card-body">
			<form action="{{route('tag.update',['id'=>$tag->id])}}"  method="POST">
				{{csrf_field()}}
				<div class="form-group">
					<input type="text" name="tag" class="form-control mb-2" value="{{$tag->tag}}">
					<input type="submit" value="Submit" class="btn btn-dark">
				</div>
			</form>
		</div>
@endsection