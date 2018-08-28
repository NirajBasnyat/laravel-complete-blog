@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success text-center">Post</div>
                <div class="card-body"><p class="lead text-center">{{$post_count}}</p></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-danger text-center">Trashed post</div>
                <div class="card-body"><p class="lead text-center">{{$trash_count}} </p></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-center">Categories</div>
                <div class="card-body"><p class="lead text-center">{{$category_count}} </p></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-info text-center">Users</div>
                <div class="card-body"><p class="lead text-center"> {{$user_count}}</p></div>
            </div>
        </div>
    </div>
@endsection
