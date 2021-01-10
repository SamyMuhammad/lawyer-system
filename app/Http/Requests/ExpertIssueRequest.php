<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpertIssueRequest extends FormRequest
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
        $id = $this->route('expert_issue');
        return [
            'issue_court_code' => 'required|numeric|unique:expert_issues,issue_court_code,'.$id, // الرقم الآلي للقضية في المحكمة,
            'type' => 'required|string|min:3', // نوع الدعوى
            'experts_court' => 'required|string|min:3',
            'expert_name' => 'required|string|min:3',
            'client_id' => 'required|exists:clients,id',
            'opponent_name' => 'required|string|min:3',
            'opponent_description' => 'required|string|min:3', // صفة الخصم
            'previous_decision' => 'required|string|min:3',
            'floor_number' => 'required|string',
            'hall_number' => 'required|string',
            'date' => 'required|date_format:Y-m-d',
        ];
    }
}
