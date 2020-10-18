<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|unique:products,name,'.$this->product.'|max:64',
            'slug' => 'required|unique:products,slug,'.$this->product.'|max:128',
            'description' => 'required|max:500',
            'price' => 'required|required_with:price',
            'img'  => 'required|mimes:jpeg,bmp,png,gif',
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
            if (!is_numeric($this->price)) {
                $validator->errors()->add('price', 'Price entered incorrectly!');
            }
        });
    }
}
