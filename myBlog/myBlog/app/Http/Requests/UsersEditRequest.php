<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
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
            //
            'name' => 'required|min:3|max:50',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|max:18',
            'role_id' => 'required',
            'photo_id' => 'mimes:jpeg, jpg, png, gif|max:1000'
        ];
    }
}
