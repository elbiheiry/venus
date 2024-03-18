<?php

namespace App\Http\Requests;

use App\Models\About;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AboutRequest extends FormRequest
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
            'description_en' => ['required'],
            'description_ar' => ['required'],
            'mission_en' => ['required'],
            'mission_ar' => ['required'],
            'values_en' => ['required'],
            'values_ar' => ['required'],
            'vision_en' => ['required'],
            'vision_ar' => ['required'],
            'certificates_en' => ['required'],
            'certificates_ar' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'image' => 'Our story image',
            'description_en' => 'Our story (EN)',
            'description_ar' => 'Our story (AR)',
            'mission_en' => 'Our mission (EN)',
            'mission_ar' => 'Our mission (AR)',
            'values_en' => 'Our values (EN)',
            'values_ar' => 'Our values (AR)',
            'vision_en' => 'Our vision (EN)',
            'vision_ar' => 'Our vision (AR)',
            'certificates_en' => 'Company certificates (EN)',
            'certificates_ar' => 'Company certificates (AR)'
        ];
    }

    public function update()
    {
        $about = About::firstOrFail();

        $data = [
            'en' => [
                'description' => $this->description_en,
                'vision' => $this->vision_en,
                'mission' => $this->mission_en,
                'values' => $this->values_en,
                'certificates' => $this->certificates_en,
            ],
            'ar' => [
                'description' => $this->description_ar,
                'vision' => $this->vision_ar,
                'mission' => $this->mission_ar,
                'values' => $this->values_ar,
                'certificates' => $this->certificates_ar,
            ]
        ];

        if ($this->image) {
            image_delete($about->image , 'about');
            $data['image'] = image_manipulate($this->image , 'about' , 1040 , 990);
        }

        $about->update($data);
    }
}
