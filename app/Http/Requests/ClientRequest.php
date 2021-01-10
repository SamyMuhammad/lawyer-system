<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $id = $this->route('client');
        return [
            'code' => 'required|numeric|unique:clients,code,'.$id,
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'phone' => 'required|numeric',
            'address' => 'required|string|min:3',
            'job' => 'required|string|min:3',
            'nationality' => 'required|string|min:3',
            'civil_number' => 'required|numeric|unique:clients,civil_number,'.$id,
            'notes' => 'nullable|string|min:3',
        ];
    }
}
