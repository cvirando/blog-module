@extends('layouts.app')

@section('breadcrumbs')
    <div class="col">
        <!-- Page pre-title -->
        <div class="page-pretitle">
        Module
        </div>
        <h2 class="page-title">
        Blog/Categories
        </h2>
    </div>
@endsection

@section('pagelinks')
<div class="col-auto ms-auto d-print-none">
    <div class="btn-list"></div>
    <div class="d-none d-sm-inline">
        <a class="btn btn-warning btn-block my-2" href="{{route('blogIndex')}}">Back</a>
        <a class="btn btn-success btn-block my-2" href="{{route('blogCategoriesCreate')}}">Add New</a>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Blog Categories</h5>
                    <div class="table-responsive">
                        <table class="table-default table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Posts</th>
                                <th scope="col">Published</th>
                                <th width="120" scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                <td width="50" class="text-center">{{$category->id}}</td>
                                <td width="90" class="text-center">
                                    @if($category->photo)
                                    <img src="{{url('images')}}/{{$category->photo}}" alt="{{$category->name}}" width="80" height="80" class="rounded">
                                    @else
                                    <span>Not Found!</span>
                                    @endif
                                </td>
                                <td>{{$category->name}}</td>
                                <td width="130" class="text-end">{{number_format($category->posts->count(), 0)}}</td>
                                <td width="80">
                                    @if($category->active)
                                    <span class="badge bg-success">Yes</span>
                                    @else
                                    <span class="badge bg-danger">No</span>
                                    @endif
                                </td>
                                <td width="120">
                                    <a href="{{route('blogCategoriesEdit', $category->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <form style="display: inline;" action="{{route('blogCategoriesDelete', $category->id)}}" onclick="return deleletconfig()" method="POST">
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
