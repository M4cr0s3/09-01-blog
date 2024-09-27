@props([
    'post'
])

<div class="card mb-3">
    <img src="{{ $post->image_path }}" class="card-img-top align-self-center" style="width: 400px; height: 400px"
         alt="{{ $post->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->content }}</p>
        <div class="d-flex justify-content-between">
            <p class="card-text
                @if($post->moderation === \App\Core\Enums\ModerationEnum::PENDING->value) text-warning @endif
                @if($post->moderation === \App\Core\Enums\ModerationEnum::EDIT->value) text-info @endif
                @if($post->moderation === \App\Core\Enums\ModerationEnum::PUBLISHED->value) text-success @endif fw-bold"
            >
                Статус: {{ $post->moderation }}</p>
            <div class="d-flex gap-2">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#test">
                    Изменить статус поста
                </button>
                <div class="modal fade" id="test" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content pb-3">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение
                                    статуса {{ $post->title }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form action="{{ route('posts.moderate', $post->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="btn-group px-3 mt-4" role="group"
                                     aria-label="Basic radio toggle button group">
                                    @if(($post->moderation !== \App\Core\Enums\ModerationEnum::PENDING->value))
                                        <input type="radio" class="btn-check" name="moderation" id="pending"
                                               autocomplete="off" checked
                                               value="{{ \App\Core\Enums\ModerationEnum::PENDING }}">
                                        <label class="btn btn-outline-warning"
                                               for="pending">{{ \App\Core\Enums\ModerationEnum::PENDING }}</label>
                                    @endif

                                    @if($post->moderation !== \App\Core\Enums\ModerationEnum::EDIT->value)
                                        <input type="radio" class="btn-check" name="moderation" id="edit"
                                               autocomplete="off" value="{{ \App\Core\Enums\ModerationEnum::EDIT }}">
                                        <label class="btn btn-outline-info"
                                               for="edit">{{ \App\Core\Enums\ModerationEnum::EDIT }}</label>
                                    @endif

                                    @if($post->moderation !== \App\Core\Enums\ModerationEnum::PUBLISHED->value)
                                        <input type="radio" class="btn-check" name="moderation" id="publish"
                                               autocomplete="off"
                                               value="{{ \App\Core\Enums\ModerationEnum::PUBLISHED }}">
                                        <label class="btn btn-outline-success"
                                               for="publish">{{ \App\Core\Enums\ModerationEnum::PUBLISHED }}</label>
                                    @endif

                                </div>
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                    <textarea class="form-control" id="title" name="moderation_comment"
                                              placeholder="Комментарий"></textarea>
                                        <label for="title">Комментарий</label>
                                    </div>
                                </div>
                                <div class="px-3 d-flex flex-column gap-2">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                                    </button>
                                    <button type="submit" class="btn btn-success">Сохранить изменения</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="card-text"><small
                class="text-muted">Обновлено: {{ $post->updated_at->locale('ru')->diffForHumans() }}</small></p>
        @if($post->moderation_comment)
            <p class="card-text">
                Комментарий: {{ $post->moderation_comment }}
            </p>
        @endif
    </div>
</div>
