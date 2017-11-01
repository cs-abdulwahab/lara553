<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        // var_dump(Auth::guard('api')->user());

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

            'name' => 'required|max:20',
            'status' => 'required',
            'designation' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {

        return [
            'email' => 'Email is invalid',
            'required' => ':attribute is required',
            'name.max' => 'Name length exceeded',

        ];

    }


}
