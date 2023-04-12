<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class SolvedExamRequest extends FormRequest
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
        'exam_id'=>'required',
        'school_id'=>'required',
        'exam_degree'=>'required',
        ];
    }
    public function messages()
    {
        return [
        'exam_id.required'=>'برجاء تحديد الاختبار',
        'school_id.required'=>'برجاء تحديد المدرسه',
        'exam_degree.required'=>'برجاء تحديد درجه الطالب',
        ];
    }
}
