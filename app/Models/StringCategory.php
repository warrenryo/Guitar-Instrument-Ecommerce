<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StringCategory extends Model
{
    use HasFactory;
    protected $table = 'string_category';
    protected $fillable = [
        'string_category_name',
        'slug',
        'status'
    ];

    public function stringProducts()
    {
        return $this->hasMany(Strings::class, 'stringCategory','string_category_name');
    }
}
