<?php

namespace App\Http\Auth\Requests;

use App\Http\Auth\DTO\RegisterDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
                'email:rfc,dns'
            ],
            'fio' => [
                'required',
            ],
            'birthday' => [
                'required',
                'date',
            ],
            'agree' => [
                'required',
                Rule::in(['on']),
            ],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
            ],
        ];
    }

    public function toDto(): RegisterDto
    {
        $data = $this->validated();

        return new RegisterDto(
            $data['fio'],
            $data['email'],
            $data['password'],
            $data['birthday'],
        );
    }
}
