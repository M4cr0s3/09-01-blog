<?php

namespace App\Http\Auth\Requests;

use App\Http\Auth\DTO\LoginDto;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => [
                'required',
                'exists:users,email'
            ],
            'password' => [
                'required',
                'min:8'
            ]
        ];
    }

    public function toDto(): LoginDto
    {
        $data = $this->validated();

        return new LoginDto(
            $data['email'],
            $data['password']
        );
    }
}
