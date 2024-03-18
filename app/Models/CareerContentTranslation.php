<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerContentTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['description' , 'locale' , 'career_content_id'];
}
