<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\BillMail;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        // dd($request->all());
        // dd(Auth::user());
        try {

            $order = Order::query()->create([
                'user_id' =>  Auth::user()->id,
                'user_email' => Auth::user()->email,
                'user_name' => Auth::user()->name,
                'user_address' => Auth::user()->address,
                'user_phone' => Auth::user()->phone,
                'receiver_email' => $request->receiver_email,
                'receiver_name' => $request->receiver_name,
                'receiver_address' => $request->receiver_address,
                'receiver_phone' => $request->receiver_phone,
                'total_price' => $request->totalAmount,
            ]);
            // dd($order);
            foreach (json_decode($request->productVariants) as $item) {
                // dd($item);
                $item->order_id = $order->id;
                // xóa sản phẩm khỏi giỏ hàng
                OrderDetail::query()->create((array)$item);
                CartDetail::query()->join('carts', 'carts.id', '=', 'cart_details.cart_id')
                    ->where(['product_variant_id' => $item->product_variant_id, 'carts.user_id' => Auth::user()->id])
                    ->delete();
            }
            $name = $request->receiver_name;
            $email = $request->receiver_email;
            $token = base64_encode($email);
            Mail::to($email)->send(new BillMail($token, $name));
            return redirect()->route('auth.home')->with('success', 'Đặt hàng thành công');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }
}