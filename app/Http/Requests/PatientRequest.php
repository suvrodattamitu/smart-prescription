<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'patient.name'             => 'required',
            'patient.age'              => 'required',
            'patient.gender'           => 'required',
            'patient.marital_status'   => 'required',
            'patient.address'          => 'required',
            'patient.mobile'           => 'required',
            'patient.height'           => 'required',
            'patient.weight'           => 'required',
            'prescription.c_c'         => 'required',
            'prescription.on_exam'     => 'required',
            'prescription.pa_exam'     => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'patient.name.required'    => 'The patient name is required',
            // 'patient.age.required'              => 'The patient age is required',
            // 'patient.visiting_no.required'      => 'The patient visiting no is required',
            // 'patient.regi_no.required'          => 'The patient regi no is required',
            // 'patient.gender.required'           => 'The patient gender is required',
            // 'patient.marital_status.required'   => 'The patient marital status is required',
            // 'patient.address.required'          => 'The patient address is required',
            // 'patient.mobile.required'           => 'The patient mobile is required',
            // 'patient.height.required'           => 'The patient height is required',
            // 'patient.weight.required'           => 'The patient weight is required',
            // 'prescription.c_c.required'         => 'The prescription cc is required',
            // 'prescription.on_exam.required'     => 'The prescription on exam is required',
            // 'prescription.pa_exam.required'     => 'The prescription pa exam is required',
        ];
    }

    public function attributes()
    {
        return [
            'patient.name'             => 'name',
            'patient.age'              => 'age',
            // 'patient.visiting_no'      => 'visiting no',
            // 'patient.regi_no'          => 'regi no',
            'patient.gender'           => 'gender',
            'patient.marital_status'   => 'marital status',
            'patient.address'          => 'address',
            'patient.mobile'           => 'mobile',
            'patient.height'           => 'height',
            'patient.weight'           => 'weight',
            'prescription.c_c'         => 'cc',
            'prescription.on_exam'     => 'on exam',
            'prescription.pa_exam'     => 'pa exam',
        ];
    }
}
