<?php

namespace App\Models;

use App\Models\Gear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';
    protected $fillable = [
        'user_id',
        'product_slug',
        'quantity',
        'size'
    ];

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
