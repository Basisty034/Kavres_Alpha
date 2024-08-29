<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_name',
        'quantity',
        'price',
        'category',
        'image',
        'seller_name',
        'seller_profile_image',
        'payment_method',
        'total_payment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}