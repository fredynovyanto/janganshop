@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 d-flex">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="javascript:;">
                    <img class="img img-thumbnail" src="{{asset('storage/'.$category->image)}}">
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-category text-gray">Detail Category</h6>
                    <h4 class="card-title">{{$category->name}}</h4>
                    <p class="card-description">{{$category->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection