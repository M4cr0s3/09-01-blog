@extends('layouts.app')

@section('title')
    Посты на модерацию
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Посты на модерацию</h1>
        <form method="get">
            <select class="form-select mt-3 w-100" aria-label="Default select example" name="moderation_type">
                <option selected disabled>Выберите статус</option>
                <option value="{{ \App\Core\Enums\ModerationEnum::PENDING }}">Под модерацией</option>
                <option value="{{ \App\Core\Enums\ModerationEnum::EDIT }}">Под редакцией</option>
                <option value="{{ \App\Core\Enums\ModerationEnum::PUBLISHED }}">Опубликованные</option>
            </select>
            <button type="submit" class="btn btn-success w-100 mt-3 mb-3">Применить</button>
        </form>

        <div class="row">
            @foreach($posts as $post)
                <x-post-list-moderation :post="$post"/>
            @endforeach
        </div>
    </div>
@endsection
