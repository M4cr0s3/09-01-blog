@extends('layouts.app')

@section('title')
    Админка | Категории
@endsection

@section('content')
    <div class="container mt-5 mb-4">
        <a class="btn btn-primary w-100 fw-bold" href="{{ route('categories.create') }}">Добавить категорию</a>
    </div>
    <x-category-list :categories="$categories"/>
    @if(session('error'))
        <x-toast :on="!!session('error')">
            <x-slot name="title">
                Ошибочка...
            </x-slot>
            <x-slot name="body">
                {{ session('error') }}
            </x-slot>
        </x-toast>
    @endif
@endsection
