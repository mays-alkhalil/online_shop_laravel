<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use App\Models\Review;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Cart;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function reviews()
//    {
//        return $this->hasMany(Review::class);
//    }

   public function cart()
   {
       return $this->hasMany(Cart::class);
   }
   
public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}

public function isAdmin()
{
    return $this->role === 1;  // أو أي قيمة تستخدمها لتعريف "Admin"
}
}
