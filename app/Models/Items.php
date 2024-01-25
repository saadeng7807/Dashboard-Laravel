<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'itemname',
        'price',
        'qty',
        'color',
        'image',
        'itemgroupno'
    ];
}
