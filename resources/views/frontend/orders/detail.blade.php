@extends('layouts.landing-page')

@section('content')
    <div class="container px-5 mb-5" style="margin-top:8rem">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h3 class="font-weight-bold">Detail Order</h3>
            </div>
            <div class="col-auto">
                <a href="{{route('my-orders')}}" class="btn btn-outline-dark">Back</a>
            </div>
        </div>
        <hr>
        <form action="{{route('accept-order', [$order->id])}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
        <div class="card shadow-sm mb-2 p-5">
            <div class="row">
                <div class="col-md-6 mb-5">
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
                                <tr class="product-data">
                                    <td>
                                        <img src="{{asset('storage/'.$item->products->image)}}" width="40px">
                                    </td>
                                    <td>{{$item->products->name}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{"Rp" . number_format($item->price, 0, ".", ".")}}</td>
                                    <input type="hidden" class="product-id" value="{{$item->products->id}}">
                                    @if ($order->status == 'completed' && !App\Models\Rating::where('user_id', Auth::id())->where('product_id', $item->products->id)->first())
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-dark btn-sm shadow mt-2 rating">Add Rating</button>
                                        </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="font-weight-bold" colspan="3">Sub Total:</td>
                                    <td class="font-weight-bold">{{"Rp" . number_format($order->total_price, 0, ".", ".")}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" colspan="3" style="border-top: none; padding-top:0;">Payment Mode:</td>
                                    <td class="font-weight-bold" style="border-top: none; padding-top:0;">{{$order->payment_mode}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" colspan="3" style="border-top: none; padding-top:0;">Status:</td>
                                    <td class="font-weight-bold" style="border-top: none; padding-top:0;">{{$order->status}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @if ($order->status == 'sent')
                        <button type="submit" class="btn btn-dark btn-block shadow mt-2">Order Accepted</button>
                    @endif
                </div>
            </div>
        </div>
        </form>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('add-rating')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id">
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Rate this Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="rating-css" style="text-align: center;">
                            <p id="modal_body"></p>
                            <div class="star-icon">
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star mr-2"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star mr-2"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star mr-2"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star mr-2"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review">Review</label>
                            <textarea class="form-control" name="review" id="review" rows="3"></textarea>
                        </div>
                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(".rating").click(function () {
                var product_id = $(this).closest('.product-data').find('.product-id').val();
                $("#product_id").val(product_id);
            });
        });
    </script>
@endsection