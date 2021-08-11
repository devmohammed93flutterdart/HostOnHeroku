@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-6">أضافة مقال</h1>
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

    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">عنوان المقال</label>
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="post title ..">
        </div>
       
        <div class="form-group">
          <label for="exampleFormControlTextarea1">تفاصيل المقال</label>
          <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="post description .."></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">صورة المقال</label>
            <input type="file" name="photo" class="form-control">
          </div>

        <div class="form-group">
            <button class="btn btn-success">حفظ</button>
          </div>
      </form>

  </div>

  @endsection