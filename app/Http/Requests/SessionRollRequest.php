<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRollRequest extends FormRequest
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
        $id = $this->route('session_roll');
        return [
            'code' => 'required|numeric|unique:session_rolls,code,' . $id, // الرقم الآلي
            'court' => 'required|string|min:3',
            'client_id' => 'required|exists:clients,id',
            'opponent_name' => 'required|string|min:3',
            'opponent_description' => 'required|string|min:3', // صفة الخصم
            'session_date' => 'required|date_format:Y-m-d',
            'previous_decision' => 'required|string|min:3',
            'date' => 'required|date_format:Y-m-d',
            'notes' => 'nullable|string|min:3',
        ];
    }
}
