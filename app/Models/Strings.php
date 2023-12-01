<?php

namespace App\Models;

use App\Models\StringGauge;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Strings extends Model
{
    use HasFactory;
    protected $table = 'string';
    protected $fillable = [
        'stringCategory',
        'string_name',
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

    public function stringImages()
    {
        return $this->hasMany(StringImages::class, 'string_id', 'id');
    }

    public function stringGauge()
    {
        return $this->hasMany(StringGauge::class, 'string_id', 'id');
    }

    public function gauge()
    {
        return $this->belongsTo(StringGauge::class, 'string_id', 'id');
    }
}
