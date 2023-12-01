<?php

namespace App\Models;

use App\Models\CartOrders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'firstName',
        'lastName',
        'company',
        'address',
        'apartment',
        'postalCode',
        'city',
        'phoneNumber',
        'contactInfo',
        'delivery_method',
        'payment_method',
        'status'
    ];

    public function cartOrders(): HasMany
    {
        return $this->hasMany(CartOrders::class, 'order_id', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_slug', 'slug');
    }
}
