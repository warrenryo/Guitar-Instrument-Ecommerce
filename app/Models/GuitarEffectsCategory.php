<?php

namespace App\Models;

use App\Models\GuitarEffects;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuitarEffectsCategory extends Model
{
    use HasFactory;
    protected $table = 'guitar_effects_category';
    protected $fillable = [
        'guitarEffectsCategory_name',
        'slug',
        'status'
    ];

    public function guitarEffectsProducts()
    {
        return $this->hasMany(GuitarEffects::class, 'guitarEffectsCategory', 'guitarEffectsCategory_name');
    }
}
