<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssueRequest extends FormRequest
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
        $id = $this->route('issue');
        return [
            'issue_number' => 'required|numeric|unique:issues,issue_number,'.$id, // رقم القضية
            'client_id' => 'required|exists:clients,id',
            'issue_court_code' => 'required|numeric|unique:issues,issue_court_code,'.$id, // الرقم الآلي للقضية في المحكمة
            'court_name' => 'required|string|min:3',
            'opponent_name' => 'required|string|min:3',
            'type' => 'required|string|min:3', // نوع الدعوى
            'subject' => 'required|string|min:3',
            'issue_date' => 'required|date_format:Y-m-d',
            'session_date' => 'required|date_format:Y-m-d',
            'opponent_description' => 'required|string|min:3', // صفة الخصم
            'previous_decision' => 'required|string|min:3',
            'issue_status' => 'required|string|min:3',
            'contract_value' => 'required|numeric',
        ];
    }
}
