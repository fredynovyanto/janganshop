<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function paymentHandler(Request $request){
        $json = json_decode($request->getContent());

        $signatureKey = hash('sha512', $json->order_id . $json->status_code . $json->gross_amount . env('MIDTRANS_SERVER_KEY'));

        if($signatureKey !== $json->signature_key){
            return abort(404);
        }

        $order = Order::where('order_id', $json->order_id)->first();
        return $order->update(['status' => 'completed']);
    }
}
