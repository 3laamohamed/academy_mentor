<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'code'=>'required|exists:login_codes,code,used,0',
            'class_room_id'=>'required',
            'class_id'=>'required',
            'school_id'=>'required',
            'branch_id'=>'required',
            'device_id'=>'required',
            'role_id'=>'required|in:3',
            'user_information'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'برجاء إدخال الاسم',
            'email.required'=>'برجاء إدخال الحساب',
            'email.email'=>' برجاء إدخال حساب صحيح',
            'email.unique'=>'هذا الحساب موجود بالفعل',
            'password.required'=>'برجاء إدخال كلمة السر',
            'code.required'=>'برجاء إدخال كود التفعيل',
            'code.exists'=>'برجاء إدخال كود تفعيل صحيح',
            'class_room_id.required'=>'برجاء اختيار المجموعه',
            'class_id.required'=>'برجاء تحديد الصف الدراسي',
            'school_id.required'=>'برجاء تحديد المدرسه',
            'branch_id.required'=>'برجاء تحديد الفرع',
            'device_id.required'=>'برجاء إدخال بيانات الجهاز',
            'role_id.required'=>'يجب ان تكون طالب لتتمكن من التسجيل',
            'user_information.required'=>'برجاء إدخال المعلومات الإضافية',
        ];
    }
}
