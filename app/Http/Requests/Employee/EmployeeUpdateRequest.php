<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
class EmployeeUpdateRequest extends FormRequest
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
                'name' => 'required',
                'email'=>'required',
                // 'phone'=>'required',
                'age'=>'numeric',
                'address'=>'required',
                // 'identification'=>'required',
                'departmentId'=>'required',
                'positionId'=>'required',
                'levelId'=>'required',
                'specializedId'=>'required',
                'salaryId'=>'required'
        ];
        
    }

    public function messages(): array
    {
       
            return [
                'name.required'=>'Bạn chưa nhập tên nhân viên.',
               
                'email.required'=>'Bạn chưa nhập email cho nhân viên.',
                // 'phone'=>'Bạn chưa nhập số điện thoại',
                'age'=>'Tuổi phải ở dạng số',
                'address'=> 'Bạn chưa nhập địa chỉ cho nhân viên',
                // 'identification'=>'Bạn chưa nhập số căn cước công dân',
                'deapartmentId'=>'Bạn chưa chọn phòng ban cho nhân viên',
                'positionId'=>'Bạn chưa chọn chức vụ cho nhân viên',
                'levelId'=>'Bạn chưa chọn trình độ',
                'specializedId'=>'Bạn chưa chọn chuyên ngành',
                'salaryId'=>'Bạn chưa chọn bậc lương'
            ];

    }
    
    // public function failedValidation(Validator $validator){
    //     throw new HttpResponseException(response()->json([
    //         'status'=>422,
    //         'success'=> false,
    //         'message'=>'Validation errors',
    //         'data'=>$validator->errors()
    //     ]),422);
    // } 
}