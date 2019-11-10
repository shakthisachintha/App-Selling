<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveApp extends FormRequest
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
            'name' => 'regex:/(^[a-zA-Z0-9 ]+$)+/',
            'prevlink' => 'required|url',
            'videolink' => 'url',
            'price' => 'required|numeric',
            'icon'=>'image',
            'cat'=>'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'App Name',
            'icon' => 'App Icon',
            'videolink' => 'Video Link',
            'prevlink' => 'Preview Link',
            'price' => 'App Price',
            'cat' => 'App Category',
        ];
    }
}
