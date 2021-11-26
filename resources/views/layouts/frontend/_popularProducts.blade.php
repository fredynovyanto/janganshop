<div class="container px-5 mb-5">
    <div class="row justify-content-between">
        <div class="col-auto">
            <h3 class="font-weight-bold">Popular Products</h3>
        </div>
        <div class="col-auto">
            <a href="{{route('popular-products')}}" class="btn btn-sm btn-dark shadow-sm">View all</a>
        </div>
    </div>
    <hr>
    <div class="card shadow-sm">
        <div class="owl-carousel owl-theme">
            @foreach ($popularProducts as $product)    
            <div class="item p-3 product-data" style="width: 12rem;">
                <a href="{{route('detail-product', [$product->id])}}">
                    <div class="image pr-4 pl-5 pt-4">
                        <img src="{{asset('storage/'.$product->image)}}" class="card-img-top" style="width: 5rem;">
                    </div>
                    <div class="card-body" style="height: 7rem;">
                        <input type="hidden" class="product-id" value="{{$product->id}}">
                        <h6 class="card-title">{{$product->name}}</h6>
                        <p class="h5 d-inline font-weight-bold">Rp{{number_format($product->selling_price, 0, ".", ".")}}</p>
                        @php
                            $id = $product->id; 
                            $r = new App\Models\Rating();
                            $rating = $r->rating($id);
                        @endphp
                        <div>
                            <i class="fa fa-star" style="color: #ffd700; font-size: 15px;"></i>
                            <span class="ml-2">{{round($rating, 1)}}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
