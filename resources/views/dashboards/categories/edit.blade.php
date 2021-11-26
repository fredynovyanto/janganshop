@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Add Category</h2>
        </div>
        <div class="card-body">
            <form action="{{route('categories.update', [$category->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name') ? old('name') : $category->name}}" class="form-control">
                        @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" value="{{old('slug') ? old('slug') : $category->slug}}" id="slug" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control">{{old('description') ? old('description') : $category->description}}</textarea>
                        @error('description')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" {{$category->status == 1 ? "checked" : ""}} name="status" id="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="popular">Popular</label>
                        <input type="checkbox" {{$category->popular == 1 ? "checked" : ""}} name="popular" id="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{old('meta_title') ? old('meta_title') : $category->meta_title}}" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_keyword">Meta Keywords</label>
                        <textarea rows="3" name="meta_keyword" id="meta_keyword" class="form-control">{{old('meta_keyword') ? old('meta_keyword') : $category->meta_keyword}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea rows="3" name="meta_description" id="meta_description" class="form-control">{{old('meta_description') ? old('meta_description') : $category->meta_description}}</textarea>
                    </div> 
                    <div class="col-md-12 mb-3">
                        @if ($category->image)
                            <img src="{{asset('storage/'.$category->image)}}" width="96px">
                        @endif
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Leave it blank if you don't want to change the image</small>
                        @error('image')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection