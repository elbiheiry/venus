<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon' , 'name' , 'link' , 'brand_id'
    ];
}
