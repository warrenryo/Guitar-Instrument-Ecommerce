<?php

namespace App\Models;

use App\Models\AccesorryImage;
use App\Models\AccessoryCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gear extends Model
{
    use HasFactory;
    protected $table = 'accessory';
    protected $fillable = [
        'gearCategory_id',
        'accessory_name',
        'category',
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

    public function acessoryImages()
    {
        return $this->hasMany(AccesorryImage::class, 'accesory_id', 'id');
    }

    public function gearCategory()
    {
        return $this->belongsTo(AccessoryCategory::class, 'gearCategory_id', 'id');
    }

}
