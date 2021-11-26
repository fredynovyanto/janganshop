@extends('layouts.landing-page')

@section('content')
    <div class="container px-5 mb-5" style="margin-top:8rem">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h3 class="font-weight-bold">My Wishlist</h3>
            </div>
        </div>
        <hr>
        @if ($wishlists->count() > 0)
        <div class="card shadow-sm mb-2 p-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th colspan="2">Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlists as $wishlist) 
                        <tr class="product-data">
                            <td class="align-middle">
                                <button type="button" class="btn btn-outline-danger float-start delete-wishlist"><i class="fa fa-trash ml-1"></i></button>
                            </td>
                            <td>
                                <div class="image p-4">
                                    <img src="{{asset('storage/'.$wishlist->product->image)}}" width="48px">
                                </div>
                            </td>
                            <td class="align-middle"><h5 class="card-title text-monospace"><strong>{{$wishlist->product->name}}</strong></h5></td>
                            <td class="align-middle">
                                <input type="hidden" class="product-id" value="{{$wishlist->product_id}}">
                                <div class="input-group text-center mb-3" style="width: 120px;">
                                    @if ($wishlist->product->qty > 0)
                                        <p class="badge badge-success">In stock</p>
                                    @else
                                        <p class="badge badge-danger">Out of stock</p>
                                    @endif
                                    </div>
                            </td>
                            <td class="align-middle"><p class="card-text text-monospace"><strong>{{"Rp" . number_format($wishlist->product->selling_price, 0, ".", ".")}}</strong></p></td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-outline-dark float-start add-to-cart">Add to cart</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
            <div class="card shadow-sm p-5 text-center font-weight-bold">
                <i class="fa fa-heart fa-3x mx-1"></i>
                <h2 class="m-3">Your Wishlist is Empty</h2>
                <div>
                    <a href="{{route('products')}}" class="btn btn-outline-dark mt-3">Start Shopping</a>
                </div>
            </div>
        @endif
    </div>

@endsection