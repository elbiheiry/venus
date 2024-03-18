<?php

namespace App\Http\Requests;

use App\Models\BrandStory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BrandStoryRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => ['image' , 'max:2048'],
            
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Our story image',
            
        ];
    }

    public function update($id)
    {
        $story = BrandStory::where('brand_id' , $id)->first();

        $data = [
            'en' => [
                'description' => $this->description_en,
                'vision' => $this->vision_en,
                'mission' => $this->mission_en,
                'values' => $this->values_en,
            ],
            'ar' => [
                'description' => $this->description_ar,
                'vision' => $this->vision_ar,
                'mission' => $this->mission_ar,
                'values' => $this->values_ar,
            ]
        ];

        if (isset($story)) {
            if ($this->image) {
                image_delete($story->image , 'about');
                $data['image'] = image_manipulate($this->image , 'brands' , 1040 , 990);
            }

            $story->update($data);    
        }else{
            
            $data['image'] = image_manipulate($this->image , 'brands' , 1040 , 990);
            $data['brand_id'] = $id;

            BrandStory::create($data);
        }
    }
}
