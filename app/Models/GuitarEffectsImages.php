<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuitarEffectsImages extends Model
{
    use HasFactory;
    protected $table = 'guitar_effects_images';
    protected $fillable = [
        'guitar_effects_id',
        'images'
    ];
}
