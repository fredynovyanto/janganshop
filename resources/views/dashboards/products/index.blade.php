@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Products</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                                    {{session('status')}}
                            </div>
                        </div>
                    </div>
                @endif
                <a href="{{route('products.create')}}" class="btn btn-primary">Add Product</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Original Price</th>
                                <th>Selling Price</th>
                                <th>Qty</th>
                                <th>Tax</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td>{{$products->firstItem() + $key}}</td>
                                <td><a href="{{route('products.show', [$product->id])}}">{{$product->name}}</a></td>
                                <td>{{$product->category->name}}</td>
                                <td>{{Str::limit($product->description, 50, '...')}}</td>
                                <td>{{"Rp. " . number_format($product->original_price, 0, ".", ".")}}</td>
                                <td>{{"Rp. " . number_format($product->selling_price, 0, ".", ".")}}</td>
                                <td>{{$product->qty}}</td>
                                <td>{{$product->tax}}</td>
                                <td>@if ($product->image)
                                    <img src="{{asset('storage/' . $product->image)}}" width="48px"/>
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('products.edit', [$product->id])}}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{route('products.destroy', [$product->id])}}" method="post" class="d-inline" onsubmit="return confirm('Do you want to delete a product?')">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            {{$products->appends(Request::all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection