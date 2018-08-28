@extends('layouts.app')

@section('content')
	{{-- errors for the create --}}
	@include('inc.messages');
	<div class="card bg-primary">
		<div class="card-header"><h2 class="lead text-center">Create a New Post</h2></div>
		<div class="card-body">

			<form action="{{route('post.store')}}" method= "POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="title" class="form-control mb-2">

					<label>Content</label>
					<textarea name="content" cols="5" rows="5" class="form-control mb-2"></textarea>

					<label>Categories</label>
					<select name="category_id" class="form-control mb-2">
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
					
					<label>Tags</label><br>
					<div class="form-check-inline">
					  <label class="form-check-label">
					  	@foreach($tags as $tag)
					    <input type="checkbox" name="tags[]" class="form-check-input" value="{{$tag->id}}">{{$tag->tag}}
					    @endforeach
					  </label>
					</div>
					
					<br>
					<label>Image</label>
					<input type="file" name="featured" class="form-control mb-2">

					<input type="submit" name="submit" value="create" class="btn btn-dark">
				</div>
				

			</form>

		</div>
	</div>
@endsection