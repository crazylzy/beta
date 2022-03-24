<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'content' => 'required',
            'files.*' => 'mimes:jpg,jpeg,png,pdf,mp4,3gp,mov,avi,wmv|max:40000',
        ];
    }

    public function messages()
    {
        return [

            'content.required' => 'Description is required',
            'files.*.mimes' => 'Only jpg,jpeg,png,pdf,mp4,3gp,mov,avi and wmv allowed'
        ];
    }
}