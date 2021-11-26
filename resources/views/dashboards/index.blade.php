@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
                <i class="material-icons">inventory</i>
            </div>
            <p class="card-category">Products</p>
            <h3 class="card-title">{{$product}}</h3>
            </div>
            <div class="card-footer">
            <div class="stats">
                <i class="material-icons">inventory</i> Total of products
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
                <i class="material-icons">category</i>
            </div>
            <p class="card-category">Categories</p>
            <h3 class="card-title">{{$category}}</h3>
            </div>
            <div class="card-footer">
            <div class="stats">
                <i class="material-icons">category</i> Total of categories
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
                <i class="material-icons">shopping_cart_checkout</i>
            </div>
            <p class="card-category">Orders</p>
            <h3 class="card-title">{{$order}}</h3>
            </div>
            <div class="card-footer">
            <div class="stats">
                <i class="material-icons">shopping_cart_checkout</i> Total of orders
            </div>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
                <i class="material-icons">people_alt</i>
            </div>
            <p class="card-category">Users</p>
            <h3 class="card-title">{{$user}}</h3>
            </div>
            <div class="card-footer">
            <div class="stats">
                <i class="material-icons">people_alt</i> Total of users
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection