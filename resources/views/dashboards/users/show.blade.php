@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Users</h4>
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
                <div class="row justify-content-center">
                    <div class="col-auto mt-5 d-flex ">
                        <div class="card-profile">
                            <div class="card-avatar">
                                <a href="javascript:;">
                                <img class="img img-thumbnail" src="{{asset('storage/default.jpg')}}">
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="badge badge-pill {{$user->is_admin == 0 ? 'badge-warning' : 'badge-success'}} mt-3">{{$user->is_admin == 1 ? 'admin' : 'seller'}}</p>
                                <h4 class="card-title mb-2"><strong>{{$user->name}}</strong></h4>
                                <p class="text-muted">{{$user->username}}</p>
                                <p class="text-muted" style="margin-top:-1rem;">{{$user->email}}</p>
                                @if ($user->id == Auth::id())
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">Edit Profile</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection