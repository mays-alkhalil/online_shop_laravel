<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'discount', 'expires_at', 'is_active',
    ];

    protected $dates = ['expires_at']; // تحويل هذا الحقل إلى Carbon instance
    
}
