@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Edit Blog Category
                            <span class="float-end">
                                <a href="{{route('blogCategories')}}" class="btn btn-sm btn-warning">Back</a>
                            </span>
                        </h5>
                      <form action="{{route('blogCategoriesUpdate', $category->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="row">
                              <div class="col-md-6">
                                  <label for="name">Name</label>
                                  <input type="text" value="{{$category->name}}" name="name" id="name" class="form-control">
                              </div>
                              <div class="col-md-6">
                                  <label for="slug">Slug</label>
                                  <input type="text" value="{{$category->slug}}" name="slug" id="slug" class="form-control">
                              </div>
                              <div class="col-md-6">
                                  <label for="photo">Photo</label>
                                  <input type="file" name="photo" id="photo" class="form-control">
                                  @if(!empty($category->photo))
                                  <a href="{{url('images')}}/big/{{$category->photo}}" target="_blank"><img src="{{url('images')}}/{{$category->photo}}" alt="{{$category->name}}" width="70" height="70" class="rounded mt-1"></a>
                                  @else
                                  No Image Found!
                                  @endif
                              </div>
                              <div class="col-md-6">
                                  <label for="description">Description</label>
                                  <textarea name="description" id="description" class="form-control" cols="15" rows="5">{!!$category->description!!}</textarea>
                              </div>
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-sm btn-primary">Update</button>
                              </div>
                          </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
