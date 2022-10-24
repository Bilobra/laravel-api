@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-8">
        <h1>Modifica post</h1>
      </div>
      <div class="col-4 text-left d-flex justify-content-end align-items-center">
        
      </div>
    </div>
  </div>
  
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form action="{{ route('admin.posts.update', $post) }}" method="POST">
  
          @csrf
          @method('PUT')
  
          <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $post->title) }}" name="title" aria-describedby="helpTitle">
            <small id="helpTitle" class="form-text text-muted">Inserisci il titolo del post.</small>
            @error('title')
              <div id="title" class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label class="d-block" for="category">Tag:</label>
  
            
            @foreach($tags as $key => $tag)
              <div class="form-check form-check-inline">
                <input  class="form-check-input" name="tags[]" @if( in_array($tag->id, old('tags', $post->tags->pluck('id')->all()) ) ) checked @endif type="checkbox" id="tag-{{$tag->id}}" value="{{ $tag->id }}">
                <label class="form-check-label" for="tag-{{$tag->id}}">{{ $tag->name }}</label>
              </div>
            @endforeach
  
          </div>
  
          <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="20" placeholder="Contenuto del post">{{ old('content', $post->content) }}</textarea>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection
