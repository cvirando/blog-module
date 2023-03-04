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
        <a class="btn btn-warning btn-block my-2" href="{{route('blogIndex')}}">Back</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(!empty($post->photo))
            <img src="{{url('images/big')}}/{{$post->photo}}" class="card-img-top" alt="{{$post->name}}">
        @endif
        <div class="card-title">{{$post->name}}</div>
        <h5>{{$post->category->name}}</h5>
        <div class="card-text">{!!$post->description!!}</div>
    </div>
</div>
@endsection
