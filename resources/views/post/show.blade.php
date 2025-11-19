@extends('layouts.main')
@section('content')
<div>

<div>{{$post->id}}. {{$post->tittle}}</div>
<div>{{$post->content}}</div>
</div>
<a class="btn btn-primary" href="{{route('post.index')}}">back</a>
<a class="btn btn-primary" href="{{route('post.edit',$post->id)}}">edit</a>
<form action="{{route('post.delete',$post->id)}}" method="post">
    @csrf
    @method('delete')
<input type="submit" value="Delete">
</form>

@endsection