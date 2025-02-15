<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'servicetype', 'address']; // Add required fields

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}

