<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        // $table->id();
        // $table->foreignIdFor(Product::class)->constrained();
        // $table->foreignIdFor(Color::class)->constrained();
        // $table->foreignIdFor(Size::class)->constrained();
        // $table->unsignedInteger('quantity');
        // $table->string('image');
        // $table->timestamps();
        // $table->unique(['product_id', 'size_id', 'color_id'], 'product_variant_unique');
        'product_id',
        'color_id',
        'size_id',
        'quantity',
        // 'price',
        'image',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}