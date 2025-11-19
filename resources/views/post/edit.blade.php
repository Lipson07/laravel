@extends('layouts.main')
@section('content')
<div>
<form action="{{route('post.update',$post->id)}}" method="post">
    @csrf
    @method('patch')
  <div class="form-group">
    <label for="tittle">tittle</label>
    <input type="text" name="tittle" class="form-control" id="tittle" value="{{$post->tittle}}" >

  </div>
  <div class="form-group">
    <label for="content">content</label>
    <textarea name="content" class="form-control" id="content"  >{{$post->content}}</textarea>

  </div>
  <div class="form-group">
    <label for="image">image</label>
    <input type="text" name="image" class="form-control" id="image" value="{{$post->image}}"  >

  </div>
  <div class="form-group">
    <label for="Category">Category</label>
    <select class="form-control" id="category" name="category_id">
    @foreach($categories as $category)
    <option
        {{ $post->category_id == $category->id ? 'selected' : '' }}
        value="{{ $category->id }}"
    >
        {{ $category->tittle }}
    </option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <select multiple class="form-control" id="tags" name="tags[]">
    @foreach($tags as $tag)
    <option
    @foreach($post->tags as $postTag)
        {{ $tag->id== $postTag->id ? 'selected' : '' }}
    @endforeach
        value="{{ $tag->id }}"
    >
        {{$tag->tittle}}
    </option>
       
   
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Update</button>
</form>
</div>
@endsection 