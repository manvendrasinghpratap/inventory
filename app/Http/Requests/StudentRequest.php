<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'center_id'         => 'required',
            'course_id'         => 'required',
            'year'              => 'required|numeric',
            'fees'              => 'required|numeric',
            'student_name'      => 'required',
            'careof'            => 'required',
        ];  
    }
    public function messages()
    {
        return [
            'center_id.required'            => 'A Centre Name is required',
            'course_id.required'            => 'A Course Name is required',
            'year.required'                 => 'Admission Year is required',
            'fees.required'                 => 'Fees is required',
            'student_name.required'         => 'Student Name is required',
            'careof.required'               => 'Father`s name is required',
        ];
    }
}
