@extends('layouts.app')

@section('title')
    Регистрация
@endsection

@section('content')
    <div class="container mt-lg-5">
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fio" class="form-label">ФИО</label>
                <input class="form-control" id="fio" aria-describedby="emailHelp" name="fio">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Подтвердите пароль</label>
                <input type="password" class="form-control" id="password" name="password_confirmation">
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Дата рождения</label>
                <input type="date" class="form-control" id="birthday" name="birthday">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="agree" id="agree">
                <label class="form-check-label" for="agree">
                    Согласие на обработку ПД
                </label>
            </div>
            <div>
                <button type="submit" class="btn w-100 btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
