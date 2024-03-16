<?php

namespace App\Http\Requests\Position;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class PositionStoreRequest extends FormRequest
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
            'namePosition' => 'required',
            'description'=>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'namePosition.required'=>'Bạn chưa nhập tên chức vụ.',
            'description.required'=>'Bạn chưa nhập mô tả cho chức vụ.',
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