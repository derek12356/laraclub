<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
                'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
                'email' => 'required|email',
                'introduction' => 'max:80',
                'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=208,min_height=208',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'User name has been used. Please enter another one.',
            'name.regex' => 'User name supports english, number, dash and underscore.',
            'name.between' => 'User name should be between 3 and 25 letters.',
            'name.required' => 'User name can not be empty.',
            'avatar.mimes' => 'Image file format can be jpeg, bmp, png, gif.',
            'avatar.dimensions' => 'Image file is too small, width of 208px and height of 208px required.'
        ];
    }
}
