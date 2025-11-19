@extends('layouts.main')
@section('content')
<div>

@foreach($posts as $post)
 <div><a href="{{route('post.show',$post->id)}}">{{$post->id}}.{{$post->tittle}}</a></div>
@endforeach
<div>
    <a class="btn btn-primary mt-3" href="{{route('post.create')}}">create</a>
  </div>
</div>
@endsection