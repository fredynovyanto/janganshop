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
            <h2>Add Product</h2>
        </div>
        <div class="card-body">
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
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
                        <textarea name="small_description" id="small_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                        @error('description')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="original_price">Original Price</label>
                        <input type="number" name="original_price" id="original_price" rows="3" class="form-control">
                        @error('original_price')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" name="selling_price" id="selling_price" rows="3" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" id="qty" rows="3" class="form-control">
                        @error('qty')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tax">Tax</label>
                        <input type="number" name="tax" id="tax" rows="3" class="form-control">
                        @error('tax')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" id="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trending">Trending</label>
                        <input type="checkbox" name="trending" id="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_keyword">Meta Keywords</label>
                        <textarea rows="3" name="meta_keyword" id="meta_keyword" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_description">Meta Description</label>
                        <textarea rows="3" name="meta_description" id="meta_description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
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
