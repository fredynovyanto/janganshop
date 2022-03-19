@extends('layouts.landing-page')

@section('content')
<div class="container px-5 mb-5" style="margin-top:8rem">
    <div class="row justify-content-between">
        <div class="col-auto">
            <h3 class="font-weight-bold">Checkout</h3>
        </div>
    </div>
    <hr>

    <form action="{{route('order')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm mb-2 p-3">
                    <h4 class="font-weight-bold">Basic Details</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-4 font-weight-bold">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name...">
                            @error('fname')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 font-weight-bold">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name...">
                            @error('lname')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 font-weight-bold">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number...">
                            @error('phone')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 font-weight-bold">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address...">
                            @error('address')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 font-weight-bold">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control" placeholder="Enter City...">
                            @error('city')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 font-weight-bold">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" class="form-control" placeholder="Enter State...">
                            @error('state')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 font-weight-bold">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" class="form-control" placeholder="Enter Country...">
                            @error('country')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 font-weight-bold">
                            <label for="code">Pin Code</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="Enter Pin Code...">
                            @error('code')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm mb-2 p-3">
                    <h4 class="font-weight-bold">Order Details</h4>
                    <hr>
                    @if ($checkout->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($checkout as $cart)
                                <tr>
                                    <td>{{$cart->product->name}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td>{{"Rp" . number_format($cart->product->selling_price, 0, ".", ".")}}</td>
                                </tr>
                                @php
                                    $total += $cart->product->selling_price * $cart->quantity;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"><strong>Total:</strong></td>
                                    <td><strong>{{"Rp" . number_format($total, 0, ".", ".")}}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <input type="hidden" name="payment_mode" value="COD">
                    <button type="submit" class="btn btn-outline-dark mb-2">Order now</button>
                    <button type="button" class="btn btn-outline-primary mb-2 btn-razorpay">Razorpay</button>
                    <button type="button" id="pay-button" class="btn btn-outline-success mb-2 btn-midtrans">Midtrans</button>
                    <div id="paypal-button-container"></div>
                    @else
                    <div class="text-center">
                        <h5 class="m-3 font-weight-bold">No Product in Cart</h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
    <script src="https://www.paypal.com/sdk/js?client-id=AR_9Zhf1zCEfDKHAA0dWlTLficrJSQQGI0qt7EYL-f5TLXMY3BuZoslgc9Xvk3ct5e5p618KAp6KASsF"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-DyFAZt-MZjFtoxaE"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <script>
        $('.btn-midtrans').click(function(e){
        e.preventDefault();

        var data = {
            'fname':$('#fname').val(),
            'lname':$('#lname').val(),
            'phone':$('#phone').val(),
            'address':$('#address').val(),
            'city':$('#city').val(),
            'state':$('#state').val(),
            'country':$('#country').val(),
            'code':$('#code').val(),
        }

        $.ajax({
            method: "POST",
            url: "/midtrans",
            data:data,
            success: function(response){
                let responses = response.params.customer_details.billing_address;
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay(response.snapToken, {
                    onSuccess: function(result){
                        /* You may add your own implementation here */
                        alert("payment success!"); console.log(result);
                    },
                    onPending: function(result){
                        /* You may add your own implementation here */
                        $.ajax({
                            method: "POST",
                            url: "/order",
                            data: {
                                'fname':responses.first_name,
                                'lname':responses.last_name,
                                'email':responses.email,
                                'phone':responses.phone,
                                'address':responses.address,
                                'city':responses.city,
                                'state':responses.state,
                                'country':responses.country,
                                'code':responses.postal_code,
                                'payment_mode':"Paid by Midtrans",
                                'payment_id':result.transaction_id,
                                'bank': result.va_numbers[0].bank,
                                'va_number' : result.va_numbers[0].va_number,
                                'order_id': result.order_id,
                            },
                            success: function(responsea){
                                Swal.fire({
                                    title : "Wating your payment!",
                                    icon : "success",
                                    toast: true,
                                    position: 'top-right',
                                    timer: 3000,
                                    showConfirmButton: false,
                                });
                                window.location.href = "/my-orders";
                            }
                        });
                    },
                    onError: function(result){
                        /* You may add your own implementation here */
                        Swal.fire({
                            title : "Payment failed!",
                            icon : "error",
                            toast: true,
                            position: 'top-right',
                            timer: 3000,
                            showConfirmButton: false,
                        });
                        alert("payment failed!"); console.log(result);
                    },
                    onClose: function(){
                        /* You may add your own implementation here */
                        Swal.fire({
                            title : "You closed the popup without finishing the payment",
                            icon : "warning",
                            toast: true,
                            position: 'top-right',
                            timer: 3000,
                            showConfirmButton: false,
                        });
                    }
                });
            },
            error: function(response){
                if(response.status == 422){
                    Swal.fire({
                        title : "Please complete your basic detail!",
                        icon : "error",
                        toast: true,
                        position: 'top-right',
                        timer: 3000,
                        showConfirmButton: false,
                    });
                }
            }
        });
    });
    </script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: '{{$total}}'
                }
                }]
            });
            },
            onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed by ' + details.payer.name.given_name);
                
                $.ajax({
                            method: "POST",
                            url: "/order",
                            data: {
                                'fname':$('#fname').val(),
                                'lname':$('#lname').val(),
                                'phone':$('#phone').val(),
                                'address':$('#address').val(),
                                'city':$('#city').val(),
                                'state':$('#state').val(),
                                'country':$('#country').val(),
                                'code':$('#code').val(),
                                'payment_mode':"Paid by Paypal",
                                'payment_id':details.id,
                            },
                            success: function(response){
                                Swal.fire({
                                    title : response.status,
                                    icon : "success",
                                    toast: true,
                                    position: 'top-right',
                                    timer: 3000,
                                    showConfirmButton: false,
                                });
                                window.location.href = "/my-orders";
                            }
                        })
            });
            }
        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.
    </script>
@endsection