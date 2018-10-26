<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title' => 'required|min:3|max:150',
            'content' => 'required|min:20|max:10000',
            'photo_id' => 'mimes:jpeg, jpg, png, gif|max:1000',
            'category_id' => 'required'
        ];
    }
}
