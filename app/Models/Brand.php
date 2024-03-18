<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Brand extends Model implements TranslatableContract
{
    use HasFactory,Translatable,Sluggable;

    protected $fillable = [
        'slug' , 'logo' , 'email' , 'phone'
    ];

    /**
     * colomns in translation table
     *
     * @var array
     */
    
    public $translatedAttributes = ['name' ,'brief'];

    /**
     * create slug input 
     *
     * @return response
     */
    public function sluggable() :Array
    {
        return [
            'slug' => [
                'source' => 'name_en'
            ]
        ];
    }

    /**
     * return brand slideshow
     *
     * @return HasMany
     */
    public function slides()
    {
        return $this->hasMany(BrandSlider::class);
    }

    /**
     * return brand partners
     *
     * @return HasMany
     */
    public function partners()
    {
        return $this->hasMany(BrandPartner::class);
    }

    /**
     * return brand products
     *
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(BrandProduct::class);
    }

    /**
     * return brand story
     *
     * @return HasOne
     */
    public function story()
    {
        return $this->hasOne(BrandStory::class);
    }

    /**
     * return brand social links
     *
     * @return HasMany
     */
    public function social_links()
    {
        return $this->hasMany(BrandSocial::class);
    }

    public function delete()
    {
        foreach ($this->slides() as $image) {
            image_delete($image->image , 'brands');
        }

        foreach ($this->partners() as $image) {
            image_delete($image->image , 'brands');
        }

        foreach ($this->products() as $image) {
            image_delete($image->image , 'brands');
        }

        return parent::delete();
    }
}
