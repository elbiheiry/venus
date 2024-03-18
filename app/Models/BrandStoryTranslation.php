<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandStoryTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['description' , 'mission' , 'values' , 'vision' , 'locale' , 'brand_story_id'];
}
