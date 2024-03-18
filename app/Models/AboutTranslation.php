<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['description' , 'mission' , 'values' , 'vision' , 'certificates', 'locale' , 'about_id'];
}
