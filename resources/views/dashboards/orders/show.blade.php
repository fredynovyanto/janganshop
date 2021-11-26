@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Detail Order</h4>
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
                <div class="row p-3">
                    <div class="col-md-6">
                        <h4 class="font-weight-bold">Shipping Details</h4>
                        <hr>
                        <label for="">Name</label>
                        <div class="border p-2 mb-3">{{$order->fname ." ". $order->lname}}</div>
                        <label for="">Email</label>
                        <div class="border p-2 mb-3">{{$order->email}}</div>
                        <label for="">Contact No.</label>
                        <div class="border p-2 mb-3">{{$order->phone}}</div>
                        <label for="">Shipping Address</label>
                        <div class="border p-2 mb-3">
                            {{$order->address}},
                            {{$order->city}},
                            {{$order->state}},
                            {{$order->country}}
                        </div>
                        <label for="">Zip Code</label>
                        <div class="border p-2">{{$order->pincode}}</div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="font-weight-bold">Order Details</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderitems as $item)
                                    <tr>
                                        <td>
                                                <img src="{{asset('storage/'.$item->products->image)}}" width="40px">
                                        </td>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{"Rp" . number_format($item->price, 0, ".", ".")}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="font-weight-bold" colspan="3">Sub Total:</td>
                                        <td class="font-weight-bold">{{"Rp" . number_format($order->total_price, 0, ".", ".")}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <form action="{{route('orders.update', $order->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="status">Order Status</label>
                                <select name="status" id="status" class="form-control selectpicker">
                                    <option value="process" {{$order->status == 'process' ? 'selected' : ''}}>Process</option>
                                    <option value="sent" {{$order->status == 'sent' ? 'selected' : ''}}>Sent</option>
                                    <option value="completed" {{$order->status == 'completed' ? 'selected' : ''}}>Completed</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection