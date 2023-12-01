<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuitarEffects extends Model
{
    use HasFactory;
    protected $table = 'guitar_effects';
    protected $fillable = [
        'guitarEffectsCategory',
        'guitar_effects_name',
        'slug',
        'brand',
        'small_description',
        'description',
        'orig_price',
        'quantity',
        'sale_price',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    public function guitarEffectsImages()
    {
        return $this->hasMany(GuitarEffectsImages::class, 'guitar_effects_id', 'id');
    }
}
