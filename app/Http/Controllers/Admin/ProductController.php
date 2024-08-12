<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::query()->with('category')->get();
        // dd($product);
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::query()->get();
        $sizes = Size::query()->get();
        $colors = Color::query()->get();
        return view('admin.product.create', compact('category', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'product_name' => ['required'],
            'image' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'integer'],
            'sale_price' => ['required'],
            'category_id' => ['required'],
        ]);
        // dd($data['image']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product', 'public');
        } else {
            $data['image'] = "";
        }
        // xử lí dữ liệu variant 
        $listProductVariant = $request->product_variants;
        // dd($listProductVariant);
        $dataProductVariant = [];
        foreach ($listProductVariant as $item) {
            $dataProductVariant[] = [
                'color_id' => $item['color'],
                'size_id' => $item['size'],
                // 'price' => $item['price'] ? $item['price'] : "",
                'quantity' => $item['quantity'],
                'image' => !empty($item['image']) ? Storage::put('product_variant', $item['image']) : "",
            ];
        }
        // dd(123);
        try {
            DB::beginTransaction();
            // dd(Product::query()->create($data));
            $product = Product::query()->create($data);
            // dd(123);
            foreach ($dataProductVariant as $item) {
                $item += ['product_id' => $product->id];
                ProductVariant::query()->create($item);
            }
            // dd(123);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
            Storage::disk('public')->delete($data['image']);
            foreach ($dataProductVariant as $item) {
                Storage::disk('public')->delete($item['image']);
            }
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::query()->with('category')->find($id);
        $productVariant = ProductVariant::query()->where('product_id', $product->id)->get();
        // dd($productVariant->all());
        $category = Category::query()->get();
        $sizes = Size::query()->get();
        $colors = Color::query()->get();
        return view('admin.product.edit', compact('product', 'category', 'productVariant', 'colors', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::query()->with('category')->find($id);
        $productVariant = ProductVariant::query()->where('product_id', $product->id)->get();
        $data = $request->validate([
            'product_name' => ['required', 'bail'],
            'description' => ['required', 'bail'],
            'price' => ['required', 'bail'],
            'category_id' => ['required', 'bail'],
        ]);
        // dd($data['image']);
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete($product->image);
            }
            $data['image'] = $request->file('image')->store('product', 'public');
        } else {
            $data['image'] = $product->image;
        }
        $listProductVariant = $request->product_variants;
        // dd($listProductVariant);
        $dataProductVariant = [];
        foreach ($listProductVariant as $index => $item) {
            $dataProductVariant[] = [
                'color_id' => $item['color'],
                'size_id' => $item['size'],
                // 'price' => $item['price'] ? $item['price'] : "",
                'quantity' => $item['quantity'],
                'image' => !empty($item['image']) ? Storage::put('product_variant', $item['image']) : $productVariant[$index - 1]->image,
                // dd($productVariant[]->image),
            ];
        }
        // dd(123);
        try {
            DB::beginTransaction();
            // dd(Product::query()->create($data));
            $product->update($data);
            // dd(123);
            foreach ($dataProductVariant as $index => $item) {
                $item += ['product_id' => $product->id];
                if ($item['image'] != $productVariant[$index]->image) {
                    Storage::delete($productVariant[$index]->image);
                }
                ProductVariant::query()->where('id', $productVariant[$index]->id)->update($item);
            }
            // dd(123);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
            Storage::disk('public')->delete($data['image']);
            foreach ($dataProductVariant as $item) {
                Storage::disk('public')->delete($item['image']);
            }
            return back();
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        try {
            DB::beginTransaction();
            $productVariant = ProductVariant::query()->where('product_id', $id)->get();
            if ($product->image) {
                Storage::delete($product->image);
            }
            // dd($productVariant);
            foreach ($productVariant as $item) {
                Storage::delete($item->image);
            }
            $product->productVariant()->delete();
            $product->delete();
            DB::commit();
            return back();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return back();
        }

        return back();
    }
}