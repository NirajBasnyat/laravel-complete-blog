@extends('layouts.frontend')

@section('content')
	<!-- Stunning Header -->

	<div class="stunning-header stunning-header-bg-lightviolet">
	    <div class="stunning-header-content">
	        <h1 class="stunning-header-title">{{$post_title}}</h1>
	    </div>
	</div>

	<!-- End Stunning Header -->


	<div class="container">
	    <div class="row medium-padding120">
	        <main class="main">
	            <div class="col-lg-10 col-lg-offset-1">
	                <article class="hentry post post-standard-details">

	                    <div class="post-thumb">
	                        <img src="/storage/uploads/posts/{{ $post->featured }}" alt="seo">
	                    </div>

	                    <div class="post__content">


	                        <div class="post-additional-info">

	                            <div class="post__author author vcard">
	                                Posted by

	                                <div class="post__author-name fn">
	                                    <a href="#" class="post__author-link">Admin</a>
	                                </div>

	                            </div>

	                            <span class="post__date">

	                                <i class="seoicon-clock"></i>

	                                <time class="published" datetime="2016-03-20 12:00:00">
	                                    {{$post->created_at->toFormattedDateString()}}
	                                </time>

	                            </span>

	                            <span class="category">
                                	<i class="seoicon-tags"></i>
                                	<a href="{{ route('category.post',['id'=>$post->category->id]) }}">{{$post->category->name}}</a>
	                            </span>

	                        </div>

	                        <div class="post__content-info">

	                           <p style="text-align:justify;">{{$post->content}}</p>

	                            <div class="widget w-tags">
	                                <div class="tags-wrap">

	                                	@foreach ($tags as $tag)
	                                		<a href="#" class="w-tags-item">{{$tag->tag}}</a>
	                                	@endforeach
	                                   
	                                </div>
	                            </div>

	                        </div>
	                    </div>


	                </article>

	                <div class="pagination-arrow">

	                	@if ($prev)
	                		<a href="{{route('single.post',['slug'=> $prev->slug])}}" class="btn-next-wrap">
	                		    <div class="btn-content">
	                		        <div class="btn-content-title">Next Post</div>
	                		        <p class="btn-content-subtitle">{{$prev->title}}</p>
	                		    </div>
	                		    <svg class="btn-next">
	                		        <use xlink:href="#arrow-right"></use>
	                		    </svg>
	                		</a>
	                	@endif

	                    @if ($next)
	                    	<a href="{{route('single.post',['slug' => $next->slug])}}" class="btn-prev-wrap">
	                    	    <svg class="btn-prev">
	                    	        <use xlink:href="#arrow-left"></use>
	                    	    </svg>
	                    	    <div class="btn-content">
	                    	        <div class="btn-content-title">Previous Post</div>
	                    	        <p class="btn-content-subtitle">{{$next->title}}</p>
	                    	    </div>
	                    	</a>
	                    @endif
	                </div>

	                <div class="comments">

	                    <div class="heading text-center">
	                        <h4 class="h1 heading-title">Comments</h4>
	                        <div class="heading-line">
	                            <span class="short-line"></span>
	                            <span class="long-line"></span>
	                        </div>
	                    </div>
	                </div>

	                @include('includes.disqus')

	                <div class="row">

	                </div>


	            </div>

	            <!-- End Post Details -->

	            

	        </main>
	    </div>
	</div>
@endsection