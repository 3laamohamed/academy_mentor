<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfoRequest extends FormRequest
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
            //
            'email'=>'email|unique:users,email,'.auth()->user()->id,
            'role_id'=>'in:3',
        ];
    }
    public function messages()
    {
        return [
            //
            'email.email'=>'برجاء ادخال حساب صحيح',
            'email.unique'=>'هذا الحساب موجود من قبل',
        ];
    }
}
