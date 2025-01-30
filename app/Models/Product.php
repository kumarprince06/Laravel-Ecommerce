<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define which attributes are mass assignable
    protected $fillable = [
        'name',          // Name of the product
        'description',   // Description of the product
        'brand',         // Brand name
        'stock',         // Stock count
        'base_price',    // Original price of the product
        'sale_price',    // Sale price of the product
        'type',          // Type of product (Physical or Digital)
        'category_id',   // Associated category ID
    ];

    // Add a relationship with the Category model (assuming each product belongs to one category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Optionally, define a relationship for product images (assuming a one-to-many relationship with Image model)
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
