@extends('layouts.main')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white py-4 rounded-top">
                    <h2 class="card-title mb-0 text-center">Создание нового поста</h2>
                </div>
                <div class="card-body p-5">
                    <form action="{{route('post.store')}}" method="post">
                        @csrf
                        
                    
                        <div class="mb-4">
                            <label for="tittle" class="form-label fw-bold">Заголовок</label>
                            <input type="text" name="tittle" class="form-control form-control-lg" id="tittle" value="{{ old('tittle') }}" placeholder="Введите заголовок поста">
                            @error('tittle')
                                <div class="text-danger mt-2">
                                    <i class="bi bi-exclamation-circle me-2"></i>{{$message}}
                                </div>
                            @enderror
                        </div>
                        
                  
                        <div class="mb-4">
                            <label for="content" class="form-label fw-bold">Содержание</label>
                            <textarea name="content" class="form-control" id="content" rows="6" placeholder="Напишите содержание вашего поста">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-danger mt-2">
                                    <i class="bi bi-exclamation-circle me-2"></i>{{$message}}
                                </div>
                            @enderror
                        </div>
                        
                     
                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">URL изображения</label>
                            <input type="text" name="image" class="form-control" id="image" value="{{ old('image') }}" placeholder="https://example.com/image.jpg">
                            @error('image')
                                <div class="text-danger mt-2">
                                    <i class="bi bi-exclamation-circle me-2"></i>{{$message}}
                                </div>
                            @enderror
                        </div>
                        
               
                        <div class="mb-4">
                            <label for="Category" class="form-label fw-bold">Категория</label>
                            <select class="form-select" id="Category" name="category_id">
                                <option value="" disabled selected>Выберите категорию</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->tittle}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                   
                        <div class="mb-5">
                            <label for="tags" class="form-label fw-bold">Теги</label>
                            <select multiple class="form-select" id="tags" name="tags[]" size="4">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}" {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'selected' : '' }}>{{$tag->tittle}}</option>
                                @endforeach
                            </select>
                            <div class="form-text">Для выбора нескольких тегов удерживайте клавишу Ctrl (Cmd на Mac)</div>
                        </div>
                        
                      
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg py-3">
                                <i class="bi bi-plus-circle me-2"></i>Создать пост
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection