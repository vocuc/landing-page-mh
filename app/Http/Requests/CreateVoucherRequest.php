<?php

namespace App\Http\Requests;

use App\Enums\Vouchers\VoucherType;
use App\Models\Voucher;
use Illuminate\Foundation\Http\FormRequest;

class CreateVoucherRequest extends FormRequest
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


    public function rules()
    {
        return [
            'code' => 'required|string|max:255|unique:vouchers,code',
            'value' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($this->input('type') == VoucherType::PERCENT->value && $value >= 100) {
                        $fail('Giá trị phần trăm phải nhỏ hơn 100.');
                    }
                },
            ],
            'type' => ['required', 'integer', 'in:' . implode(',', array_column(VoucherType::cases(), 'value'))],
        ];
    }
}
