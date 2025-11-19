@extends('layouts.main')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <!-- Кнопки навигации -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a class="btn btn-outline-secondary" href="{{route('post.index')}}">
                    <i class="bi bi-arrow-left me-1"></i>Назад к списку
                </a>
                <div class="btn-group">
                    <a class="btn btn-outline-warning" href="{{route('post.edit',$post->id)}}">
                        <i class="bi bi-pencil me-1"></i>Редактировать
                    </a>
                    <form action="{{route('post.delete',$post->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Вы уверены, что хотите удалить этот пост?')">
                            <i class="bi bi-trash me-1"></i>Удалить
                        </button>
                    </form>
                </div>
            </div>

            <!-- Карточка поста -->
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Заголовок -->
                <div class="card-header bg-primary text-white py-4 rounded-top">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h1 class="card-title h2 mb-2">{{$post->tittle}}</h1>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark">
                                    <i class="bi bi-hash me-1"></i>ID: {{$post->id}}
                                </span>
                                @if($post->category)
                                    <span class="badge bg-info">
                                        <i class="bi bi-bookmark me-1"></i>{{$post->category->tittle}}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Контент -->
                <div class="card-body p-5">
                    @if($post->image)
                        <div class="text-center mb-4">
                            <img src="{{$post->image}}" alt="{{$post->tittle}}" class="img-fluid rounded-3 shadow-sm" style="max-height: 400px;">
                        </div>
                    @endif
                    
                    <div class="post-content">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                    
                    <!-- Теги -->
                    @if($post->tags && $post->tags->count() > 0)
                        <div class="mt-5 pt-4 border-top">
                            <h6 class="fw-bold mb-3">Теги:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                    <span class="badge bg-secondary py-2 px-3">
                                        <i class="bi bi-tag me-1"></i>{{$tag->tittle}}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Футер карточки -->
                <div class="card-footer bg-light py-3 rounded-bottom">
                    <div class="row text-muted small">
                        <div class="col-md-6">
                            <i class="bi bi-calendar me-1"></i>Создан: 
                            @if($post->created_at)
                                {{$post->created_at->format('d.m.Y H:i')}}
                            @else
                                Не указано
                            @endif
                        </div>
                        <div class="col-md-6 text-md-end">
                            <i class="bi bi-arrow-clockwise me-1"></i>Обновлен: 
                            @if($post->updated_at)
                                {{$post->updated_at->format('d.m.Y H:i')}}
                            @else
                                Не указано
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.post-content {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #333;
}
.card {
    transition: transform 0.2s ease;
}
.card:hover {
    transform: translateY(-2px);
}
</style>
@endsection