<div class="container px-5 mb-5">
    <div class="row justify-content-between">
        <div class="col-auto">
            <h3 class="font-weight-bold">All Products</h3>
        </div>
        <div class="col-auto">
            <a href="{{route('products')}}" class="btn btn-sm btn-dark shadow-sm">View all</a>
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
                        <h6 class="card-title">{{$product->name}}</h6>
                        <div class="justify-content-between d-flex">
                            <p class="h5 font-weight-bold d-inline">{{"Rp" .number_format($product->selling_price, 0, ".", ".")}}</p>
                            <span class="text-muted text-truncate ml-2"><s>Rp{{number_format($product->original_price, 0, ".", ".")}}</s></span>
                        </div>
                        @php
                            $id = $product->id; 
                            $r = new App\Models\Rating();
                            $rating = $r->rating($id);
                        @endphp
                        <i class="fa fa-star" style="color: #ffd700; font-size: 15px;"></i>
                        <span class="ml-2">{{round($rating, 1)}}</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

