@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-6">رفع صورة نتيجة التحليل</h1>
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

    <form action="{{route('result.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="FormControlInput1">صورة نتيجة التحليل</label>
            <input type="file" name="res_photo" class="form-control">
          </div>

        <div class="form-group">
            <button class="btn btn-success">حفظ</button>
          </div>
      </form>

  </div>

  @endsection