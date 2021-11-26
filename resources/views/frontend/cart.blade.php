@extends('layouts.landing-page')

@section('content')
    <div class="container px-5 mb-5" style="margin-top:8rem">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h3 class="font-weight-bold">Carts</h3>
            </div>
        </div>
        <hr>
        @if ($carts->count() > 0)
        <div class="card shadow-sm mb-2 p-5">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($carts as $cart) 
                        <tr class="product-data">
                            <td>
                                <div class="image p-4">
                                    <img src="{{asset('storage/'.$cart->product->image)}}" width="48px">
                                </div>
                            </td>
                            <td class="align-middle"><h5 class="card-title text-monospace"><strong>{{$cart->product->name}}</strong></h5></td>
                            <td class="align-middle">
                                <input type="hidden" class="product-id" value="{{$cart->product_id}}">
                                <div class="input-group text-center mb-3" style="width: 120px;">
                                    @if ($cart->quantity < $cart->product->qty)
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-dark changeQuantity decrement-btn">-</button>
                                        </div>
                                        <input type="text" name="quantity" value="{{$cart->quantity}}" class="form-control border border-dark text-center qty-input">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-dark changeQuantity increment-btn">+</button>
                                        </div>
                                    @else
                                        <p class="badge badge-danger">Out of stock</p>
                                        @endif
                                    </div>
                                </td>
                            <td class="align-middle"><p class="card-text text-monospace"><strong>{{"Rp" . number_format($cart->product->selling_price, 0, ".", ".")}}</strong></p></td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-outline-danger float-start delete-item"><i class="fa fa-trash ml-1"></i></button>
                            </td>
                        </tr>
                        @php
                            $total += $cart->product->selling_price * $cart->quantity;
                        @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="align-middle pl-4"><strong>Total:</strong></td>
                            <td class="align-middle"><strong>{{"Rp" . number_format($total, 0, ".", ".")}}</strong></td>
                            <td class="align-middle"><a href="{{route('checkout')}}" class="btn btn-dark ">Checkout</a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        @else
            <div class="card shadow-sm p-5 text-center font-weight-bold">
                <i class="fa fa-shopping-cart fa-3x mx-1"></i>
                <h2 class="m-3">Your Cart is Empty</h2>
                <div>
                    <a href="{{route('products')}}" class="btn btn-outline-dark mt-3">Continue Shopping</a>
                </div>
            </div>
        @endif
    </div>

@endsection