<?php

namespace App\Http\Requests;

use App\Models\BrandSocial;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BrandSocialRequest extends FormRequest
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
            'icon' => ['required' , 'max:255' , 'string'],
            'link' => ['required' , 'max:255' , 'string'],
            'name' => ['required' , 'max:225' , 'string']
        ];
    }

    public function attributes()
    {
        return [
            'icon' => 'Icon',
            'link' => 'Link',
            'name' => 'Name'
        ];
    }

    public function store($id)
    {
        $data = $this->all();
        $data['brand_id'] = $id;
        BrandSocial::create($data);
    }

    public function update($id)
    {
        BrandSocial::findOrFail($id)->update($this->all());
    }
}
