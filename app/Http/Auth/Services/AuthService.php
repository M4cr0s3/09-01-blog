<?php

namespace App\Http\Auth\Services;

use App\Http\Auth\DTO\LoginDto;
use App\Http\Auth\DTO\RegisterDto;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AuthService
{
    public function register(RegisterDto $dto): RedirectResponse
    {
        $existedUser = User::query()
            ->where('email', $dto->getEmail())
            ->first();

        if ($existedUser) throw new BadRequestException('User with such email already exists.');

        User::query()
            ->create([
                'fio' => $dto->getFio(),
                'email' => $dto->getEmail(),
                'password' => Hash::make($dto->getPassword()),
                'birthday' => $dto->getBirthday()
            ]);

        return redirect()->route('index');
    }

    public function login(LoginDto $dto): RedirectResponse
    {
        $user = User::query()
            ->where('email', $dto->getEmail())
            ->first();

        if (!$user) {
            Session::flash('error', 'Incorrect email');
            return redirect()->route('auth.index');
        };

        if (!Hash::check($dto->getPassword(), $user->password)) {
            Session::flash('error', 'Incorrect password');
            return redirect()->route('auth.index');
        }

        Auth::login($user);

        return redirect()->route('index');
    }
}
