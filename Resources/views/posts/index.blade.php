@extends('layouts.app')

@section('breadcrumbs')
    <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
        Module
        </div>
        <h2 class="page-title">
        Blog/Posts
        </h2>
    </div>
@endsection

@section('pagelinks')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list"></div>
    <div class="d-none d-sm-inline">
        <a class="btn btn-warning btn-block my-2" href="{{route('blogIndex')}}">Back</a>
        <a class="btn btn-success btn-block my-2" href="{{route('blogPostsCreate')}}">Add New</a>
    </div>
</div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blog Posts</h5>
                        <div class="table-responsive">
                            <table class="table-default table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Published</th>
                                    <th width="120" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                    <td width="50" class="text-center">{{$post->id}}</td>
                                    <td width="90" class="text-center">
                                        @if($post->photo)
                                        <img src="{{url('images')}}/{{$post->photo}}" alt="{{$post->name}}" width="80" height="80" class="rounded">
                                        @else
                                        <span>Not Found!</span>
                                        @endif
                                    </td>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td width="80">
                                        @if($post->active)
                                        <span class="badge bg-success">Yes</span>
                                        @else
                                        <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td width="120">
                                        <a href="{{route('blogPostsEdit', $post->id)}}" class="btn btn-sm btn-info">Edit</a>
                                        <form style="display: inline;" action="{{route('blogPostsDelete', $post->id)}}" onclick="return deleletconfig()" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
