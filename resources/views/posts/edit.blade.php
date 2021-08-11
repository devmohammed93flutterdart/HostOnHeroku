@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-6">Edit Post</h1>
                  <a href="{{route('posts')}}" class="btn btn-primary">All Posts</a>
                </div>
              </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <ul>
            @foreach ($errors as $i)
                <li>
                    {{ $i }}
                </li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('post.update', ['id'=> $post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Post Title</label>
          <input type="text" name="title" value="{{$post->title}}" class="form-control" id="exampleFormControlInput1">
        </div>
       
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Post Description</label>
          <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">
            {{$post->title}}
          </textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Post Image</label>
            <input type="file" name="photo" class="form-control">
          </div>

        <div class="form-group">
            <button class="btn btn-success">Save Post</button>
          </div>
      </form>

  </div>

  @endsection