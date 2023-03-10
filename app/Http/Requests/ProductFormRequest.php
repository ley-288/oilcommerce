<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'category_id' => [
                'required',
                'integer'
            ],
            'headline' => [
                'required',
                'string'
            ],
            'title' => [
                'required',
                'string'
            ],
            'author' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string',
                'max:255'
            ],
            'brand' => [
                'required',
                'string',
                'max:255'
            ],
            'summary' => [
                'required',
                'string'
            ],

            /*
            'content' => [
                'nullable',
                'string'
            ],
            'original_price' => [
                //'required',
                'integer'
            ],
            'selling_price' => [
                //'required',
                'integer'
            ],
            'quantity' => [
                //'required',
                'integer'
            ],
            */

            'trending' => [
                'nullable',
            ],
            'status' => [
                'nullable'
            ],
            'meta_title' => [
                'required',
                'string',
                'max:255'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'meta_description' => [
                'required',
                'string'
            ],
            'image' => [
                'nullable',
                //'image|mimes:jpg,png,jpeg'
            ],
        ];
    }
}
