<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToDoRequest extends FormRequest
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
            'name'=>'required|string|max:20',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'поле Название является обязательным',
            'name.string'=>'поле Название должно быть строкой',
            'name.max' =>'Название не более 20 символов'
        ];
    }
}
