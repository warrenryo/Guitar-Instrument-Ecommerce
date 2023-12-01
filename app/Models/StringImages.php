<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StringImages extends Model
{
    use HasFactory;
    protected $table = 'string_images';
    protected $fillable = [
        'string_id',
        'images',
    ];
}
