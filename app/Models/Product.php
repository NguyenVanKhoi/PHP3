<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        // $table->id();
        //     $table->string('product_name', 50);
        //     $table->string('description');
        //     $table->boolean('sale')->default(false);
        //     $table->foreignIdFor(Category::class)->constrained();
        //     $table->timestamps();
        'product_name',
        'image',
        'description',
        'price',
        'sale_price',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class);
    }
}