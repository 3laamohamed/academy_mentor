<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiTrait;

class LoginRequest extends FormRequest
{
        use ApiTrait;
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
            'email'=>'required|exists:users,email',
            'password'=>'required',
            'device_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            //
            'email.required'=>'من فضلك ادخل الحساب ',
            'email.exists'=>'هذا الحساب غير موجود',
            'password.required'=>'من فضلك ادخل كلمة السر',
            'device_id.required'=>'من فضلك ادخل بيانات الجهاز',
        ];
    }

}
