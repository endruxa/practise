<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequestController extends FormRequest
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
                'title' => 'required|min:3',
          'description' => 'required',
    'description_short' => 'required|min:5',
           'meta_title' => 'required|min:3',
     'meta_description' => 'required|min:3',
         'meta_keyword' => 'required|min:3'
            ];
        return $rules;
    }
}
