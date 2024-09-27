@extends('layouts.app')

@section('title')
    Авторизация
@endsection

@section('content')
    <div class="container mt-lg-5">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn w-100 btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
