<?php

namespace App\Http\Requests\Level;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class LevelStoreRequest extends FormRequest
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
                'name' => 'required|unique:levels',
                'description'=>'required'
        ];
        
    }

    public function messages(): array
    {
       
            return [
                'name.required'=>'Bạn chưa nhập tên trình độ.',
                'name.unique'=>'Tên trình độ này đã tồn tại trong hệ thống.',
                'description.required'=>'Bạn chưa nhập mô tả cho trình độ.',
            ];

    }

    // public function failedValidation(Validator $validator){
    //     throw new HttpResponseException(response()->json([
    //         'success'=> false,
    //         'message'=>'Validation errors',
    //         'data'=>$validator->errors()
    //     ]));
    // } 
}