<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'first_name'  => 'required|string|max:20',
            'second_name' => 'required|string|max:20',
            'email'       => 'required|email|',
            'mobile'      => 'required|numeric',
            'password'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('messages.required'),
            'unique' => trans('messages.unique'),
        ];
    }
}
