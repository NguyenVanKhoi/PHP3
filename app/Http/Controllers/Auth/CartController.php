<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function list()
    {
        // lấy thông tin user đăng nhập
        $user = Auth::user();
        // lấy thông tin cart
        $cart = Cart::query()->where('user_id', $user->id)->first();
        $totalAmount = 0;
        $productVariants = $cart->cartDetail()
            ->join('product_variants', 'product_variants.id', '=', 'cart_details.product_variant_id')
            ->join('products', 'products.id', '=', 'product_variants.product_id')
            ->join('sizes', 'sizes.id', '=', 'product_variants.size_id')
            ->join('colors', 'colors.id', '=', 'product_variants.color_id')
            ->get([
                'cart_details.id as cartItem_id',
                'product_variants.id as product_variant_id',
                'products.product_name as product_name',
                'products.price as product_price',
                'products.sale_price as product_sale_price',
                'product_variants.image as product_image',
                'sizes.size as variant_size_name',
                'colors.color as variant_color_name',
                'cart_details.quantity as quantity'
            ]);
        foreach (collect($productVariants) as $item) {
            $totalAmount += $item['quantity'] * ($item['product_sale_price'] ? $item['product_sale_price'] : $item['product_price']);
        }
        // dd($productVariants->toArray());
        return view('auth.cart', compact('totalAmount', 'productVariants'));
    }
    public function add(Request $request)
    {
        // dd($request->all());
        $product = Product::query()->where('id', $request->product_id)->first();
        $productVariant = ProductVariant::query()->where(
            [
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
            ]
        )->first();
        $user = Auth::user();
        // dd($user);
        $cart = Cart::query()->where('user_id', $user->id)->first();
        if (empty($cart)) {
            $cart = Cart::query()->create([
                'user_id' => $user->id
            ]);
        };
        $data = [
            'product_variant_id' => $productVariant->id,
            'cart_id' => $cart->id,
            'quantity' => $request->quantity,
        ];
        $cartDetail = CartDetail::query()->where('product_variant_id', $productVariant->id)->first();
        if (empty($cartDetail)) {
            CartDetail::query()->create($data);
        } else {
            $data["quantity"] += $cartDetail->quantity;
            $cartDetail->update(["quantity" => $data["quantity"]]);
        }
        return redirect()->route('cart.list');
    }
    public function deleteOneCartDetail($id)
    {
        // dd($id);
        $user = Auth::user();
        // dd($user);
        $cart = Cart::query()->where('user_id', $user->id)->first();
        // dd($cart);
        $cartDetail = CartDetail::query()
            ->where('id', $id)
            ->delete();
        // dd($cartDetail);
        return redirect()->route('cart.list');
    }
    public function deleteAllCartDetail()
    {
        $user = Auth::user();
        $cart = Cart::query()->where('user_id', $user->id)->first();
        $cartDetail = CartDetail::query()
            ->where('cart_id', $cart->id)
            ->delete();
        return redirect()->route('cart.list');
    }
}