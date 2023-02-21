@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{!! config('blog.name') !!}</h1>
    <p>
        <a class="btn btn-sm btn-info" href="{{route('blogCategories')}}">Categories</a>
        <a class="btn btn-sm btn-info" href="{{route('blogPosts')}}">Posts</a>
    </p>
    <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="card">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                <h5 class="card-title">{{$post->name}}</h5>
                <a href="{{route('blogShow', $post->slug)}}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @empty
            <p>Sorry. No post available at the moment.</p>
        @endforelse
    </div>


@endsection
