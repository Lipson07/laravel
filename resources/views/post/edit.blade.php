@extends('layouts.main')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-warning text-dark py-4 rounded-top">
                    <h2 class="card-title mb-0 text-center">
                        <i class="bi bi-pencil-square me-2"></i>Редактирование поста
                    </h2>
                </div>
                <div class="card-body p-5">
                    <form action="{{route('post.update',$post->id)}}" method="post">
                        @csrf
                        @method('patch')
                        
                        <!-- Заголовок -->
                        <div class="mb-4">
                            <label for="tittle" class="form-label fw-bold">Заголовок</label>
                            <input type="text" name="tittle" class="form-control form-control-lg" id="tittle" value="{{$post->tittle}}">
                        </div>
                        
                        <!-- Контент -->
                        <div class="mb-4">
                            <label for="content" class="form-label fw-bold">Содержание</label>
                            <textarea name="content" class="form-control" id="content" rows="6">{{$post->content}}</textarea>
                        </div>
                        
                        <!-- Изображение -->
                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">URL изображения</label>
                            <input type="text" name="image" class="form-control" id="image" value="{{$post->image}}">
                        </div>
                        
                        <!-- Категория -->
                        <div class="mb-4">
                            <label for="category" class="form-label fw-bold">Категория</label>
                            <select class="form-select" id="category" name="category_id">
                                @foreach($categories as $category)
                                    <option {{ $post->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                        {{ $category->tittle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Теги -->
                        <div class="mb-5">
                            <label for="tags" class="form-label fw-bold">Теги</label>
                            <select multiple class="form-select" id="tags" name="tags[]" size="4">
                                @foreach($tags as $tag)
                                    <option 
                                        @foreach($post->tags as $postTag)
                                            {{ $tag->id == $postTag->id ? 'selected' : '' }}
                                        @endforeach
                                        value="{{ $tag->id }}"
                                    >
                                        {{$tag->tittle}}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text">Для выбора нескольких тегов удерживайте клавишу Ctrl (Cmd на Mac)</div>
                        </div>
                        
                        <!-- Кнопки -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{route('post.show',$post->id)}}" class="btn btn-outline-secondary me-md-2">
                                <i class="bi bi-arrow-left me-1"></i>Назад
                            </a>
                            <button type="submit" class="btn btn-warning px-4">
                                <i class="bi bi-check-circle me-1"></i>Обновить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection