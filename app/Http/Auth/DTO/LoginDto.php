<?php

namespace App\Http\Auth\DTO;

readonly class LoginDto
{
    public function __construct(
        private string $email,
        private string $password,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
        ];
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}
