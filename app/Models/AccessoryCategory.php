<?php

namespace App\Models;

use App\Models\Gear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccessoryCategory extends Model
{
    use HasFactory;
    protected $table = 'accessory_category';
    protected $fillable = [
        'accessory_category_name',
        'slug',
        'status'
    ];

    public function gearProducts()
    {
        return $this->hasMany(Gear::class, 'gearCategory_id', 'id');
    }
}
