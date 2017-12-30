<?php

namespace App\Http\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequestController extends FormRequest
{

    public function authorize()
    {
        \Auth::check();
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
        if ('admin.category.update' == array_get($this->route()->action, 'as')) {
            $rules['title'] = 'required|min:3|unique:articles,title,' . $this->article->id;
        }
        return $rules;
    }

}

