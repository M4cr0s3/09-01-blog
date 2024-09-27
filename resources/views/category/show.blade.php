@extends('layouts.app')

@section('title')
    {{ $category->title }}
@endsection

@section('content')
    <div class="container mt-5">
        <div
            class="bg-body-secondary d-flex align-items-center justify-content-between p-3 border border-dark-subtle rounded-2 shadow-sm">
            {{ $category->title }}
        </div>
        <div class="mt-3">
            <a class="btn btn-primary" href="{{ route('categories.index') }}">Назад</a>
        </div>
    </div>

@endsection
