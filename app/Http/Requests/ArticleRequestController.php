<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequestController extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|string|min:4|max:25',
            'description_short' => 'required|min:5',
            'description' => 'required|max:255',
            'meta_title' => 'required|string|min:4|max:25',
            'meta_description' => 'required|string|min:4|max:25',
            'meta_keyword' => 'required|string|min:4|max:25'
        ];
        return $rules;
    }
}
