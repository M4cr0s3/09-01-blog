@extends('layouts.app')

@section('title')
    Редактирование категории {{ $category->title }}
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}"
                       placeholder="Название категории">
                <label for="title">Название категории</label>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
@endsection
