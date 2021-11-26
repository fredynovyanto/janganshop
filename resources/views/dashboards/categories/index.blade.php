@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Categories</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                    {{session('status')}}
                            </div>
                        </div>
                    </div>
                @endif
                <a href="{{route('categories.create')}}" class="btn btn-primary">Add Category</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{$categories->firstItem() + $key}}</td>
                                <td><a href="{{route('categories.show', [$category->id])}}">{{$category->name}}</a></td>
                                <td>{{$category->slug}}</td>
                                <td>{{Str::limit($category->description, 50, '...')}}</td>
                                <td>@if ($category->image)
                                    <img src="{{asset('storage/' . $category->image)}}" width="48px"/>
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('categories.edit', [$category->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{route('categories.destroy', [$category->id])}}" method="post" class="d-inline" onsubmit="return confirm('Do you want to delete a category?')">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            {{$categories->appends(Request::all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection