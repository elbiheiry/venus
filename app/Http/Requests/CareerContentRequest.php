<?php

namespace App\Http\Requests;

use App\Models\CareerContent;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CareerContentRequest extends FormRequest
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
            'image' => ['image' , 'max:255'],
            'description_en' => ['required'],
            'description_ar' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Image',
            'description_en' => 'Description (EN)',
            'description_ar' => 'Description (AR)'
        ];
    }

    public function update()
    {
        $content = CareerContent::firstOrFail();

        $data = [
            'en' => [
                'description' => $this->description_en
            ],
            'ar' => [
                'description' => $this->description_ar
            ]
        ];

        if ($this->image) {
            image_delete($content->image , 'content');
            $data['image'] = image_manipulate($this->image , 'content' , 540 , 440);
        }

        $content->update($data);
    }
}
