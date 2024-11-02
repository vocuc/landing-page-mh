<?php

namespace App\Http\Requests;

use App\Rules\ValidPhone;
use Illuminate\Foundation\Http\FormRequest;

class ProductPaymentCreateRequest extends FormRequest
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
            'user_name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'nullable',
                'email',
                'max:255'
            ],
            'phone' => [
                'required',
                new ValidPhone(),
            ]
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Không được để trống',
            'user_name.max' => 'Không được nhập quá 255 ký tự',
            'email.required' => 'Không được để trống',
            'email.max' => 'Không được nhập quá 255 ký tự',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Không được để trống',
        ];
    }
}
