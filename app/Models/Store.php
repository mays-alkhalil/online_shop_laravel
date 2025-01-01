<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'address', 'image', 'owner_id', 'status'];


    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'store_id'); // تأكد من استخدام المفتاح الصحيح للعلاقة
    }
}
