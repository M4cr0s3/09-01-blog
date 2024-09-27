<?php

namespace App\Http\Auth\Controllers;

use App\Http\Auth\Requests\LoginRequest;
use App\Http\Auth\Requests\RegisterRequest;
use App\Http\Auth\Services\AuthService;
use Illuminate\Http\RedirectResponse;

readonly class AuthController
{
    public function __construct(private AuthService $authService)
    {
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        return $this->authService->register($request->toDto());
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        return $this->authService->login($request->toDto());
    }
}
