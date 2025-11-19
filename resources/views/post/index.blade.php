@extends('layouts.main')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h1 class="display-5 fw-bold text-primary">Все посты</h1>
                <a class="btn btn-primary btn-lg" href="{{route('post.create')}}">
                    <i class="bi bi-plus-circle me-2"></i>Создать пост
                </a>
            </div>
            
            @if($posts->count() > 0)
                <div class="row g-4">
                    @foreach($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 post-card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{route('post.show',$post->id)}}" class="text-decoration-none text-dark">
                                        {{$post->id}}. {{$post->tittle}}
                                    </a>
                                </h5>
                                <p class="card-text text-muted">
                                    {{ Str::limit($post->content, 100) }}
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">ID: {{$post->id}}</small>
                                    <a href="{{route('post.show',$post->id)}}" class="btn btn-outline-primary btn-sm">
                                        Читать <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="bi bi-journal-text display-1 text-muted"></i>
                        <h3 class="mt-3">Пока нет постов</h3>
                        <p class="text-muted">Создайте первый пост, нажав на кнопку ниже</p>
                        <a class="btn btn-primary mt-3" href="{{route('post.create')}}">
                            <i class="bi bi-plus-circle me-2"></i>Создать первый пост
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.post-card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}
.empty-state {
    max-width: 400px;
    margin: 0 auto;
}
</style>
@endsection