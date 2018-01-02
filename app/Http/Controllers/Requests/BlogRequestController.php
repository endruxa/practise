<?php

namespace App\Http\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequestController extends FormRequest
{

    public function authorize()
    {
        return \Auth::check();
    }


    public function rules()
    {
        $rules = [

            'title' => 'required|min:3|unique:articles',
            'description' => 'required',
            'description_short' => 'required',
            'meta_title' => 'required|min:3',
            'meta_description' => 'required|min:3',
            'meta_keyword' => 'required|min3'
        ];

        return $rules;
    }

}

