<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wishlist;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'brand_id',
        'category_id',
        'name',
        'description',
        'price',
        'discount_percentage',
        'thumbnail_url'
    ];

    /**
     * Relasi ke wishlist
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}