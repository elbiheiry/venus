<?php

namespace App\Http\Requests;

use App\Models\Brand;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 400));
    }

    /**
     * on creation set validation rules 
     *
     * @return array
     */
    protected function onCreate() {
        return [
            'logo' => ['required' , 'image' , 'max:2048'],
            'name_en' => ['required' , 'string' , 'max:255'],
            'name_ar' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'max:2048' , 'email'],
            'phone' => ['required'],
            'brief_en' => ['required'],
            'brief_ar' => ['required']
        ];
    }

    /**
     * on update set validation rules 
     *
     * @return array
     */
    protected function onUpdate() {
        return [
            'logo' => ['image' , 'max:2048'],
            'name_en' => ['required' , 'string' , 'max:255'],
            'name_ar' => ['required' , 'string' , 'max:255'],
            'email' => ['required' , 'string' , 'max:2048' , 'email'],
            'phone' => ['required'],
            'brief_en' => ['required'],
            'brief_ar' => ['required']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->isMethod('put') ? $this->onUpdate() : $this->onCreate();
    }

    public function attributes()
    {
        return [
            'logo' => 'Brand logo',
            'name_en' => 'Brand name (EN)',
            'name_ar' => 'Brand name (AR)',
            'brief_en' => 'Brand brief (EN)',
            'brief_ar' => 'Brand brief (AR)',
            'email' => 'Brand contact email',
            'phone' => 'Brand contact phone'
        ];
    }

    public function store()
    {
        $data = [
            'en' => [
                'name' => $this->name_en,
                'brief' => $this->brief_en
            ],
            'ar' => [
                'name' => $this->name_ar,
                'brief' => $this->brief_ar
            ],
            'email' => $this->email,
            'phone' => $this->phone,
            'slug' => SlugService::createSlug(Brand::class , 'slug' , $this->name_en , ['unique' => true]),
            'logo' => image_manipulate($this->logo , 'brands' , 1000 , 1000)
        ];

        Brand::create($data);
    }

    public function update($id)
    {
        $brand = Brand::findOrFail($id);

        $data = [
           'en' => [
                'name' => $this->name_en,
                'brief' => $this->brief_en
            ],
            'ar' => [
                'name' => $this->name_ar,
                'brief' => $this->brief_ar
            ],
            'email' => $this->email,
            'phone' => $this->phone,
        ];

        if ($this->name_en != $brand->translate('en')->name) {
            $data['slug'] = SlugService::createSlug(Brand::class , 'slug' , $this->name_en , ['unique' => true]);
        }

        if ($this->logo) {
            image_delete($brand->logo , 'brands');
            $data['logo'] = image_manipulate($this->logo , 'brands' , 1000 , 1000);
        }

        $brand->update($data);
    }
}
