@extends('layouts.dashboard')
@section('script')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#categories').select2({
        placeholder: 'Select category',
        dataType: 'json',
        method: 'GET',
        ajax: {
            url: 'http://janganshop.test/dashboards/ajax-categories',
            processResults: function(data){
                return {
                    results: data.map(function(item){
                        return {
                            id: item.id, 
                            text: item.name
                        } 
                    })
                    }
                }
            }
        });
    </script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Edit Product</h2>
        </div>
        <div class="card-body">
            <form action="{{route('products.update', [$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name') ? old('name') : $product->name}}" class="form-control">
                        @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="categories">Category</label><br>
                        <select name="categories" id="categories" class="form-control"></select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="small_description">Small Description</label>
                        <textarea name="small_description" id="small_description" rows="3" class="form-control">{{old('small_description') ? old('small_description') : $product->small_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control">{{old('description') ? old('description') : $product->description}}</textarea>
                        @error('description')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="original_price">Original Price</label>
                        <input type="number" name="original_price" id="original_price" value="{{old('original_price') ? old('original_price') : $product->original_price}}" class="form-control">
                        @error('original_price')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" name="selling_price" id="selling_price" value="{{old('selling_price') ? old('selling_price') : $product->selling_price}}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" id="qty" value="{{old('qty') ? old('qty') : $product->qty}}" class="form-control">
                        @error('qty')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tax">Tax</label>
                        <input type="number" name="tax" id="tax" value="{{old('tax') ? old('tax') : $product->tax}}" class="form-control">
                        @error('tax')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" id="status" {{$product->status == 1 ? "checked" : ""}}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trending">Trending</label>
                        <input type="checkbox" name="trending" id="trending" {{$product->trending == 1 ? "checked" : ""}}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{old('meta_title') ? old('meta_title') : $product->meta_title}}" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_keyword">Meta Keywords</label>
                        <textarea rows="3" name="meta_keyword" id="meta_keyword" class="form-control">{{old('meta_keyword') ? old('meta_keyword') : $product->meta_keyword}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea rows="3" name="meta_description" id="meta_description" class="form-control">{{old('meta_description') ? old('meta_description') : $product->meta_description}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        @if ($product->image)
                            <img src="{{asset('storage/'.$product->image)}}" width="96px">
                        @endif
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Leave it blank if you don't want to change the image</small>
                        @error('image')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
