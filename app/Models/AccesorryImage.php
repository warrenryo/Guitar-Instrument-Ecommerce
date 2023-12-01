<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesorryImage extends Model
{
    use HasFactory;
    protected $table = 'accessory_images';
    protected $fillable = [
        'accesory_id',
        'images'
    ];
}
