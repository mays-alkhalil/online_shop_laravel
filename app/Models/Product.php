<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'category_id','size','color'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

       // المنتجات ذات الصلة
       public function relatedProducts()
       {
           return $this->where('category_id', $this->category_id)
                       ->where('id', '!=', $this->id) // استثناء المنتج الحالي
                       ->get();
       }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function averageRating()
{
    return $this->reviews()->avg('rating');
}

public function cart()
{
    return $this->belongsTo(Cart::class);
}

public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}


}

