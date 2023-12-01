<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StringGauge extends Model
{
    use HasFactory;
    protected $table = 'string_gauge';
    protected $fillable = [
        'string_id',
        'string_gauge',
    ];
}
