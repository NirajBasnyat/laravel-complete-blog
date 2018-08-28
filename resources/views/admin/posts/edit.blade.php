@extends('layouts.app')

@section('content')
	{{-- errors for the create --}}
	@include('inc.messages');
	<div class="card bg-info">
		<div class="card-header"><h2 class="lead text-center">Edit Post</h2></div>
		<div class="card-body">
		
			<form action="{{route('post.update',['id'=> $post->id])}}" method= "POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					
					<label>Title</label>
					<input type="text" name="title" class="form-control mb-2" value="{{$post->title}}">

					<label>Content</label>
					<textarea name="content"  cols="5" rows="5" class="form-control mb-2">{{$post->content}}</textarea>

					<label>Categories</label>
					<select name="category_id" class="form-control">
						@foreach($categories as $category)
							<option value="{{$category->id}}"
							
							@if ($category->id == $post->category->id)
								selected 
							@endif
		
							>{{$category->name}}</option>
						@endforeach
					</select>

					<label>Tags</label><br>
					<div class="form-check-inline">
					  <label class="form-check-label">
					  	@foreach($tags as $tag)
					    <input type="checkbox" name="tags[]" class="form-check-input" value="{{$tag->id}}"
						
						@foreach ($post->tags as $t)
							@if ($t->id == $tag->id)
								checked 
							@endif
						@endforeach
			
			
					    >{{$tag->tag}}
					    @endforeach
					  </label>
					</div><br>

					<label>Image</label>
					<input type="file" name="featured" class="form-control mb-2">

					<input type="submit" name="submit" value="Update" class="btn btn-dark">
				
				</div>
				

			</form>
		</div>
	</div>
@endsection