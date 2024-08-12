<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        // $table->id();
        //     $table->foreignIdFor(ProductVariant::class)->constrained();
        //     $table->foreignIdFor(Order::class)->constrained();
        //     // sao lưu thông tin và biến thể sản phẩm
        //     $table->string('product_name');
        //     $table->string('product_price');
        //     $table->string('product_image');
        //     $table->string('product_sale_price');

        //     $table->string('variant_size_name');
        //     $table->string('variant_color_name');
        //     $table->string('quantity');
        //     $table->timestamps();
        'product_variant_id',
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'product_sale_price',
        'product_image',
        'variant_size_name',
        'variant_color_name',
        'quantity',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}