<?php

namespace App\Http\Requests\Salary;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class SalaryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'salaryStep'=>'required|numeric',
            'basicSalary'=>'required|numeric',
            'coefficientsSalary'=>'required|numeric',
            'allowanceCoefficient'=>'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'salaryStep.required'=>'Bạn chưa nhập vào bậc lương.',
            'salaryStep.numeric'=>'Bậc lương phải là 1 số.',
            'basicSalary.required'=>'Bạn chưa nhập vào lương cơ bản.',
            'basicSalary.numeric'=>'Lương cơ bản phải là 1 số.',
            'coefficientsSalary.required'=>'Bạn chưa nhập vào hệ số lương.',
            'coefficientsSalary.numeric'=>'Hệ số lương phải là 1 số.',
            'allowanceCoefficient.required'=>'Bạn chưa nhập vào hệ số phụ cấp.',
            'allowanceCoefficient.numeric'=>'Hệ số phụ số phải là 1 số.',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success'=> false,
            'message'=>'Validation errors',
            'data'=>$validator->errors()
        ]));
    } 
}