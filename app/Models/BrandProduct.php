<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    use HasFactory;

    protected $fillable = ['image' , 'name' , 'name_ar' , 'brand_id'];

    public function delete()
    {
        image_delete($this->image , 'brands');
        return parent::delete();
    }
}
