@extends('layouts.landing-page')

@section('content')
    <div class="container px-5 mb-5" style="margin-top:8rem">
        <div class="card mb-3 shadow-sm product-data">
            <div class="row no-gutters">
                <div class="col-md-4 justify-content-center d-flex my-5">
                    <img src="{{asset('storage/'.$product->image)}}" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1><strong>{{$product->name}}</strong></h1>
                        @php
                            $rating_value = number_format($rating);
                        @endphp
                            <div class="rating">
                                @for ($i = 0; $i < $rating_value; $i++)
                                    <i class="fa fa-star" style="color: #ffd700; font-size: 20px;"></i>
                                @endfor
                                @for ($j = $rating_value; $j < 5; $j++)
                                <i class="fa fa-star" style="color: #c0c6c8; font-size: 20px;"></i>
                                @endfor
                                <span class="ml-2">{{round($rating, 1)}}</span>
                            </div>
                        <div class="row my-3 align-items-center">
                            <div class="col-auto">
                                <p class="h5"><s>{{"Rp" . number_format($product->original_price, 0, ".", ".")}}</s></p>
                            </div>
                            <div class="col-auto">
                                <p class="h3 font-weight-bold">{{"Rp" . number_format($product->selling_price, 0, ".", ".")}}</p>
                            </div>
                        </div>
                        <p class="card-text">{{$product->small_description}}</p>
                        <hr>
                        <label for="quantity">Quantity</label>
                        <div class="row justify-content-start">
                            <div class="col-md-3">
                                <input type="hidden" class="product-id" value="{{$product->id}}">
                                <div class="input-group text-center mb-3" style="width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-dark decrement-btn">-</button>
                                    </div>
                                    <input type="text" name="quantity" value="1" class="form-control border border-dark text-center qty-input">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-dark increment-btn">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto align-items-center d-flex">
                                @if ($product->qty > 0)
                                    <p class="text-muted">{{$product->qty}} stock left</p>
                                @else
                                    <p class="badge badge-danger">Out of stock</p>
                                @endif
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-danger float-start add-to-wishlist">Add to wishlist <i class="fa fa-heart ml-1"></i></button>
                        @if ($product->qty > 0)
                            <button type="button" class="btn btn-dark float-start add-to-cart">Add to cart <i class="fa fa-shopping-cart ml-1"></i></button>
                        @endif
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
            <div class="container">
                <hr>
                <h3><strong>Description</strong></h3>
                <div class="mb-3">
                    {{$product->description}}
                </div>
                <h3><strong>Review</strong></h3>
                <div class="container">
                    <h1 class="font-weight-bold d-inline">{{round($rating, 1)}}</h1>
                    <span class="h5">/5</span>
                    <div class="rating mb-3 mt-2">
                        @for ($i = 0; $i < $rating_value; $i++)
                            <i class="fa fa-star" style="color: #ffd700; font-size: 20px;"></i>
                        @endfor
                        @for ($j = $rating_value; $j < 5; $j++)
                        <i class="fa fa-star" style="color: #c0c6c8; font-size: 20px;"></i>
                        @endfor
                        <span class="ml-2">{{round($rating, 1)}}</span>
                    </div>
                </div>
                <hr>
                    @foreach ($reviews as $review)
                    <div class="review px-3">
                        <h6 class="font-weight-bold">{{$review->user->name}}</h6>
                        <div>
                            @if ($review->rating)
                                @php
                                    $user_rated = $review->rating;
                                @endphp
                                @for ($i = 0; $i < $user_rated; $i++)
                                    <i class="fa fa-star" style="color: #ffd700; font-size: 15px;"></i>
                                @endfor
                                @for ($j = $user_rated; $j < 5; $j++)
                                    <i class="fa fa-star" style="color: #c0c6c8; font-size: 15px;"></i>
                                @endfor
                            @endif
                        </div>
                        <small class="d-block text-muted">{{$review->created_at->format('d M Y')}}</small>
                        <div class="mt-3">
                            <p>{{$review->review}}</p>
                        </div>
                    </div>
                    <hr>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
