@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">
                        Add New Blog Category
                        <span class="float-end">
                            <a href="{{route('blogCategories')}}" class="btn btn-sm btn-warning">Back</a>
                        </span>
                    </h5>
                      <form action="{{route('blogCategoriesStore')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('POST')

                          <div class="row">
                              <div class="col-md-6">
                                  <label for="name">Name</label>
                                  <input type="text" name="name" id="name" class="form-control">
                              </div>
                              <div class="col-md-6">
                                  <label for="slug">Slug</label>
                                  <input type="text" name="slug" id="slug" class="form-control">
                              </div>
                              <div class="col-md-6">
                                  <label for="photo">Photo</label>
                                  <input type="file" name="photo" id="photo" class="form-control">
                              </div>
                              <div class="col-md-6">
                                  <label for="description">Description</label>
                                  <textarea name="description" id="description" class="form-control" cols="15" rows="5"></textarea>
                              </div>
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-sm btn-primary">Save</button>
                              </div>
                          </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
