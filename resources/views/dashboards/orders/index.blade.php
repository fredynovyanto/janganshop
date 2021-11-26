@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Orders</h4>
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
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order) 
                        <tr>
                            <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                            <td>{{$order->tracking_no}}</td>
                            <td>{{"Rp" . number_format($order->total_price, 0, ".", ".")}}</td>
                            <td><p class="badge badge-pill {{$order->status == 'process' ? 'badge-warning' : 'badge-success'}}">{{$order->status}}</p></td>
                            <td>
                                <a href="{{route('orders.show', $order->id)}}" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            {{$orders->appends(Request::all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection