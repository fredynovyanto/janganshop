@extends('layouts.landing-page')

@section('content')
    <div class="container px-5 mb-5" style="margin-top:8rem">
        <div class="row justify-content-between">
            <div class="col-auto">
                <h3 class="font-weight-bold">My Orders</h3>
            </div>
        </div>
        <hr>
        <div class="card shadow-sm bg-white py-3 mb-3">
            <ul class="nav justify-content-center">
                <li class="nav-item mr-2">
                    <a class="nav-link rounded d-flex {{Request::get('status') == NULL || Request::get('status') == 'process' && Request::path() == 'my-orders' ? 'active shadow-sm bg-dark text-white' : ''}}" href="{{route('my-orders', ['status' => 'process'])}}">
                        <i class="material-icons mr-2 ">cached</i>
                        <h6>Processed</h6>
                    </a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link rounded d-flex {{Request::get('status') == 'sent' ? 'active shadow-sm bg-dark text-white' : ''}}" href="{{route('my-orders', ['status' => 'sent'])}}">
                        <i class="material-icons mr-2 ">inventory</i>
                        <h6>Sent</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded d-flex {{Request::get('status') == 'completed' ? 'active shadow-sm bg-dark text-white' : ''}}" href="{{route('my-orders', ['status' => 'completed'])}}">
                        <i class="material-icons mr-2 ">check_circle_outline</i>
                        <h6>Finished</h6>
                    </a>
                </li>
            </ul>
        </div>
        <div class="card shadow-sm bg-white mb-2 p-5">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Tracking Number</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order) 
                        <tr>
                            <td class="align-middle"><h5 class="text-monospace"><strong>{{$order->tracking_no}}</strong></h5></td>
                            <td class="align-middle"><p class="text-monospace">{{date('d-m-Y', strtotime($order->created_at))}}</p></td>
                            <td class="align-middle"><p class="text-monospace">{{"Rp" . number_format($order->total_price, 0, ".", ".")}}</p></td>
                            <td class="align-middle"><p class="text-monospace badge badge-pill {{$order->status == 'process' ? 'badge-warning' : 'badge-success'}}">{{$order->status}}</p></td>
                            <td class="align-middle">
                                <a href="{{route('view-order', $order->id)}}" class="btn btn-outline-dark btn-sm float-start">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
