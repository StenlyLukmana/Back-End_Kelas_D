<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:5|max:100',
            'author' => 'required|string|min:3|max:50',
            'price' => 'required|integer|min:500',
            'release' => 'required|date',
            'image',
            'category_id' =>'required'
        ];
    }
}
