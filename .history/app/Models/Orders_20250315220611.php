<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['user_id', 'product_id', 'quantity', 'total_price', 'address', 'pincode', 'phone', 'status'];
}
