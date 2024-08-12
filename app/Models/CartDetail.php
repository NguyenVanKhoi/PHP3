<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        // $table->id();
        //     $table->foreignIdFor(Cart::class)->constrained();
        //     $table->foreignIdFor(ProductVariant::class)->constrained();
        //     $table->unsignedInteger('quantity')->default(0);
        //     $table->timestamps();
        'cart_id',
        'product_variant_id',
        'quantity',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function productVariant()
    {
        return $this->hasOne(ProductVariant::class);
    }
}