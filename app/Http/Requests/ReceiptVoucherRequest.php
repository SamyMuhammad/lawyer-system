<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptVoucherRequest extends FormRequest
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
        $id = $this->route('receipt_voucher');
        return [
            'number' => 'required|numeric|unique:receipt_vouchers,number,'.$id,
            'issue_type' => 'required|string|min:3',
            'date' => 'required|date_format:Y-m-d',
            'client_id' => 'required|exists:clients,id',
            'cost' => 'required|numeric',
            'notes' => 'nullable|string|min:3',
        ];
    }
}
