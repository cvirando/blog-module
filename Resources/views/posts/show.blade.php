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
        <a class="btn btn-warning btn-block my-2" href="{{route('blogPosts')}}">Back</a>
    </div>
</div>
@endsection

@section('content')
    <h1>Show Blog Post</h1>
@endsection
