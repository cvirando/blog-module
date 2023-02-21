@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
            <div class="col-md-12">
                <p>
                    <a class="btn btn-sm btn-info" href="{{route('blogIndex')}}">Blog</a>
                    <a class="btn btn-sm btn-info" href="{{route('blogPosts')}}">Posts</a>
                    <span class="float-end">
                        <a class="btn btn-sm btn-success" href="{{route('blogCategoriesCreate')}}">Add New</a>
                    </span>
                </p>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blog Categories</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Posts</th>
                                    <th width="120" scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->photo}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{number_format($category->posts->count(), 0)}}</td>
                                    <td width="120">
                                        <a href="{{route('blogCategoriesEdit', $category->id)}}" class="btn btn-sm btn-info">Edit</a>
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
