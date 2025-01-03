<?php
namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status', 'total_amount','payment_method', 'order_date', 'coupon_id', 'discounted_amount', 'address', 'phone_number', 'cvv' // الحقول التي تريد تعديلها
    ];

public function items()
{
    return $this->hasMany(OrderItem::class);
}

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

public function getTotalAmountAttribute()
{
    return $this->items->sum(function ($item) {
        return $item->unit_price * $item->quantity;
    });
}
public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
}
