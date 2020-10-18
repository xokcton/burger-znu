<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:128',
            'email' => 'required|unique:questions,email,'.$this->question.'|max:128|required_with:email',
            'problem' => 'required|max:256',
        ];
    }

    /**
     * Настройка экземпляра валидатора.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $validator->errors()->add('email', 'Email entered incorrectly!');
            }
        });
    }
}
