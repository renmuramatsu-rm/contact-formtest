<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            'first_name' =>'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'tel' => 'required|regex:[0-9]|digits_between:10,11',
            'address' => 'required',
            'category_id' => 'required',
            'detail' => 'required|max:120',
        ];
    }
}
