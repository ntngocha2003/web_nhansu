<?php

namespace App\Http\Requests\Level;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class LevelUpdateRequest extends FormRequest
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
            'nameLevel' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nameLevel.required'=>'Bạn chưa nhập tên trình độ.',
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