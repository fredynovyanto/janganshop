<div class="container px-5 mb-5">
    <div class="row justify-content-between">
        <div class="col-auto">
            <h3 class="font-weight-bold">Category</h3>
        </div>
    </div>
    <hr>
    <div class="card shadow-sm">
        <div class="owl-carousel owl-theme">
            @foreach ($categories as $category)    
            <div class="item pt-3">
                <a href="{{route('detail-category', [$category->id])}}" style="text-decoration:none; color:#505962;">
                    <img src="{{asset('storage/'.$category->image)}}" style="width: 30%; margin-left: auto; margin-right: auto;"  alt="">
                    <h5 class="card-title text-monospace text-center pt-2"><strong>{{$category->name}}</strong></h5>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
