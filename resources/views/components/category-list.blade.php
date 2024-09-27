@props([
    'categories'
])

<div class="container">
    @foreach($categories as $category)
        <div
            class="bg-body-secondary d-flex align-items-center justify-content-between p-3 border border-dark-subtle rounded-2 shadow-sm mb-3">
            <a href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a>
            <div class="d-flex gap-3">
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Редактировать</a>
                <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

