@extends('layouts.app')

@section('breadcrumbs')
    <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
        Module
        </div>
        <h2 class="page-title">
        Blog
        </h2>
    </div>
@endsection

@section('pagelinks')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list"></div>
    <div class="d-none d-sm-inline">
        <a class="btn btn-orange btn-block my-2" href="{{route('blogCategories')}}">Categories</a>
        <a class="btn btn-lime btn-block my-2" href="{{route('blogPosts')}}">Posts</a>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4">
            <div class="card">
                @if(!empty($post->photo))
                <img src="{{url('images/big')}}/{{$post->photo}}" class="card-img-top" alt="{{$post->name}}">
                @endif
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
</div>
@endsection
