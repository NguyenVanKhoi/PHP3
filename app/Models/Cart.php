<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        // $table->id();
        //     $table->foreignIdFor(User::class)->constrained();
        //     $table->timestamps();
        'user_id',
    ];

    public function cartDetail()
    {
        return $this->hasMany(CartDetail::class);
    }
}