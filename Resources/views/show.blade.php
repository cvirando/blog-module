@extends('layouts.app')

@section('content')
    <h1>{{$post->name}}</h1>
    <h5>{{$post->category->name}}</h5>

    <p>
        <a href="{{route('blogIndex')}}">Blog</a>
    </p>

    <div>{!!$post->description!!}</div>

@endsection
