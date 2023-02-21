@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-12">
                <p>
                    <a class="btn btn-sm btn-info" href="{{route('blogIndex')}}">Blog</a>
                    <a class="btn btn-sm btn-info" href="{{route('blogCategories')}}">Categories</a>
                    <span class="float-end">
                        <a class="btn btn-sm btn-success" href="{{route('blogPostsCreate')}}">Add New</a>
                    </span>
                </p>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blog Posts</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th width="120" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td>{{$post->photo}}</td>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->category->name}}</td>
                                    <td width="120">
                                        <a href="{{route('blogPostsEdit', $post->id)}}" class="btn btn-sm btn-info">Edit</a>
                                        <button class="btn btn-sm btn-danger">Delete</button>
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
