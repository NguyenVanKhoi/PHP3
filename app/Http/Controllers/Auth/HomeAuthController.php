<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeAuthController extends Controller
{
    //
    public function index()
    {
        $banner = Banner::query()->get();
        // dd($banner);
        return view('auth.index', compact('banner'));
    }
    public function shop()
    {
        $banner = Banner::query()->get();
        $product = Product::query()->get();
        return view('auth.shop', compact('product', 'banner'));
    }
    public function detailProduct($id)
    {
        $product = Product::query()->where('id', $id)->with('productVariant')->first();
        // dd($product);
        $productVariants = $product->productVariant->all();
        // dd($productVariants);
        $colorId = [];
        $sizeId = [];
        foreach ($productVariants as $item) {
            $colorId[] = $item->color_id;
            $sizeId[] = $item->size_id;
        }
        // dd($sizeId);
        $colors = Color::query()->whereIn('id', $colorId)->pluck('color', 'id')->all();
        // dd($colors);
        $sizes = Size::query()->whereIn('id', $sizeId)->pluck('size', 'id')->all();
        // dd($sizes);
        $category_id = $product->category_id;
        // dd($category_id);
        $relatedProduct = Product::query()->where('id', '!=', $id)->where('category_id', $category_id)->get();
        // dd($relatedProduct);
        return view('auth.detail', compact('product', 'relatedProduct', 'sizes', 'colors'));
    }
    public function category($id)
    {
        $category = Category::query()->find($id);
        $product = Product::query()->where('category_id', $id)->get();
        return view('auth.category', compact('product', 'category'));
    }
    public function contact()
    {
        return view('auth.contact');
    }
    public function about()
    {
        return view('auth.about');
    }
    // public function cart()
    // {
    //     return view('auth.cart');
    // }
}