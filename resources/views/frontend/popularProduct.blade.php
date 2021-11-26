@extends('layouts.landing-page')

@section('content')
    <div class="container px-5 mb-5" style="margin-top:8rem">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h3 class="font-weight-bold">Popular Products</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($products as $product)    
            <div class="col-auto p-2 product-data">
                <a href="{{route('detail-product', [$product->id])}}">
                    <div class="card shadow-sm" style="width: 12.3rem;">
                        <div class="image pt-4 text-center">
                            <img src="{{asset('storage/'.$product->image)}}" class="card-img-top" style="width: 5rem;">
                        </div>
                        <div class="card-body" style="height: 7rem;">
                            <input type="hidden" class="product-id" value="{{$product->id}}">
                            <p class="card-title">{{$product->name}}</p>
                            <p class="d-inline font-weight-bold">Rp</p><h5 class="card-text font-weight-bold d-inline">{{number_format($product->selling_price, 0, ".", ".")}}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{$products->appends(Request::all())->links()}}
            </div>
        </div>
    </div>

@endsection