@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit user</h2>
        </div>
        <div class="card-body">
            <form action="{{route('users.update', [$user->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name') ? old('name') : $user->name}}" class="form-control">
                        @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="{{old('username') ? old('username') : $user->username}}" id="username" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{old('email') ? old('email') : $user->email}}" id="email" class="form-control">
                    </div>
                    <div class="col-md-12 card-header">
                        <h4>Update Password</h4>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password">Old Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter old password...">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password...">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter confirm password...">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection