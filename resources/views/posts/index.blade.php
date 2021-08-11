@extends('layouts.app')

@section('content')

  <div class="container">

   
    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-6">كل المقالات</h1>
                  <a href="{{route('post.create')}}" class="btn btn-success">مقال جديد</a>
                  <a href="{{route('posts.trashed')}}" class="btn btn-danger">سلة المحذوفات</a>
                </div>
              </div>
        </div>
    </div>
<div class="row">
  <div class="col">
    @if ($posts->count() > 0)
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان المقال</th>
            <th scope="col">كتب بواسطة</th>
            <th scope="col">صورة المقال</th>
            <th scope="col">التاريخ</th>
            <th scope="col">حذف</th>
          </tr>
        </thead>
        <tbody>
          @php
              $posts_count = 1;
          @endphp
            @foreach ($posts as $item)
            <tr>
                <th scope="row">{{$posts_count++}}</th>
                <td>{{$item->title}}</td>
                <td>{{$item->user->name}}</td>
                <td><img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" class="img-thumbnail" width="100"></td>
                <td>{{$item->created_at->diffForhumans()}}</td>
                <td>
                    {{-- <a class="btn btn-warning" href="{{route('post.edit', ['id', $item->id])}}"><i class="fas fa-pencil-alt"></i></a> --}}
                    {{-- <a class="btn btn-primary" href="{{route('post.show')}}"><i class="far fa-eye"></i></a> --}}
                    @if ($item->user_id == Auth::id())
                    <a class="btn btn-danger" href="{{route('post.destroy', ['id'=> $item->id])}}"><i class="far fa-trash-alt"></i></a>
   
                    @endif                    
                </td>
              </tr> 

            @endforeach
          
        </tbody>
      </table>


    @else

  </div>
</div>
   
    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            لا توجد مقالات!
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button> --}}
         </div>
    </div>
        
    @endif


    


  </div>

  @endsection