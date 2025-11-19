@extends('layouts.main')
@section('content')
<div>
<form action="{{route('post.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="tittle">tittle</label>
    <input type="text" name="tittle" class="form-control" id="tittle"  value="{{ old('tittle') }}" >
    @error('tittle')
    <p class="text-danger">{{$message}}</p>
@enderror
  </div>
  <div class="form-group">
    <label for="content">content</label>
    <textarea name="content" class="form-control" id="content" >{{ old('content') }}</textarea>
    @error('content')
    <p class="text-danger">{{$message}}</p>
@enderror
  </div>
  <div class="form-group">
    <label for="image">image</label>
    <input type="text" name="image" class="form-control" id="image" value="{{ old('image') }}">
    @error('image')
    <p class="text-danger">{{$message}}</p>
@enderror
  </div>
  <div class="form-group">
    <label for="Category">Category</label>
    <select class="form-control" id="Category" name="category_id">
     @foreach($categories as $category)
     <option value="{{$category->id}}">{{$category->tittle}}</option>
     @endforeach
    </select>
  </div>

    <div class="form-group">
    <label for="tags">Tags</label>
    <select multiple class="form-control" id="tags" name="tags[]">
    @foreach($tags as $tag)
    <option value="{{$tag->id}}">{{$tag->tittle}}</option>
       
   
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
</div>
@endsection 