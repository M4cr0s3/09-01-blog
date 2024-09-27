<?php

namespace App\Http\Auth\DTO;

readonly class RegisterDto
{
    public function __construct(
        private string $fio,
        private string $email,
        private string $password,
        private string $birthday,
        private int    $role = 0,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'fio' => $this->getFio(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'birthday' => $this->getPassword(),
            'role' => $this->getRole(),
        ];
    }

    public function getFio(): string
    {
        return $this->fio;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function getRole(): int
    {
        return $this->role;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


}
