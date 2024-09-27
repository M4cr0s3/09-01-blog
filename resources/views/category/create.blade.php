@extends('layouts.app')

@section('title')
    Админка | Создать категорию
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" name="title"
                       placeholder="Название категории">
                <label for="title">Название категории</label>
                @error('title')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Сохранить</button>
        </form>
    </div>
@endsection
