<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartOrders extends Model
{
    use HasFactory;
    protected $table = 'cart_orders';
    protected $fillable = [
        'order_id',
        'user_id',
        'product_slug',
        'quantity',
        'size',
    ];

    public function cartOrder(): BelongsTo
    {
        return $this->belongsTo(Orders::class, 'order_id','id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_slug', 'slug');
    }

    public function accessory(): BelongsTo
    {
        return $this->belongsTo(Gear::class, 'product_slug', 'slug');
    }

    public function strings(): BelongsTo
    {
        return $this->belongsTo(Strings::class, 'product_slug', 'slug');
    }

    public function guitarEffects(): BelongsTo
    {
        return $this->belongsTo(GuitarEffects::class, 'product_slug', 'slug');
    }
}
