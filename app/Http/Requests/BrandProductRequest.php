<?php

namespace App\Http\Requests;

use App\Models\BrandProduct;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BrandProductRequest extends FormRequest
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
            'image' => ['required' , 'image' , 'max:2048'] ,
            'name' => ['required' , 'string' , 'max:255'],
            'name_ar' => ['required' , 'string' , 'max:255']
        ];
    }

    /**
     * on update set validation rules 
     *
     * @return array
     */
    protected function onUpdate() {
        return [
            'image' => ['image' , 'max:2048'],
            'name' => ['required' , 'string' , 'max:255'],
            'name_ar' => ['required' , 'string' , 'max:255']
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

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'image' => 'Image',
            'name' => 'Name (EN)',
            'name_ar' => 'Name (AR)'
        ];
    }

    public function store($id)
    {
        BrandProduct::create([
            'image' => image_manipulate($this->image , 'brands' , 540 , 675),
            'name' => $this->name,
            'name_ar' => $this->name_ar,
            'brand_id' => $id
        ]);
    }

    public function update($id)
    {
        $media = BrandProduct::findOrFail($id);
        
        $data = $this->all();

        if ($this->image) {
            image_delete($media->image , 'brands');
            $data['image'] = image_manipulate($this->image , 'brands' , 540 , 675);
            
        }
        
        $media->update($data);
    }
}
