<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->route('user');
        $rules = [
            'name' => 'required|string|min:3',
            'phone' => 'required|numeric|unique:users,phone,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|string|min:6|confirmed',
            'photo' => 'nullable|image',
            'address' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'nullable|exists:permissions,id',
            'roles' => 'nullable|array',
            'roles.*' => 'nullable|exists:roles,id',
        ];
        if ($this->isMethod('PATCH') || $this->isMethod('PUT')) {
            $rules['password'] = 'nullable|string|min:6|confirmed';
        }
        return $rules;
    }
}
