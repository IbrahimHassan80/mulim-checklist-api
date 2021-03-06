<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Add_admin_request extends FormRequest
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
            'name' => 'required|max:40|min:6|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
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
