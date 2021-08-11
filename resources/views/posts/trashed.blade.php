@extends('layouts.app')

@section('content')

  <div class="container">

   
    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-6">Trashed Posts</h1>
                  <a href="{{route('posts')}}" class="btn btn-success">All Post</a>
                </div>
              </div>
        </div>
    </div>

    @if ($posts->count() > 0)
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان المقال</th>
            <th scope="col">كتب بواسطة</th>
            <th scope="col">صورة المقال</th>
            <th scope="col">تاريخ الحذف</th>
            <th scope="col">حذف المقال بشكل نهائي</th>
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
                <td>{{$item->deleted_at->diffForhumans()}}</td>
                <td>
                    {{-- <a class="btn btn-warning" href="{{route('post.edit', ['id', $item->id])}}"><i class="fas fa-pencil-alt"></i></a> --}}
                    {{-- <a class="btn btn-primary" href="{{route('post.restore', ['id', $item->id])}}"><i class="fas fa-undo-alt"></i></a> --}}
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        <i class="far fa-trash-alt"></i>
                      </button>                    
                </td>
              </tr> 

            @endforeach
          
        </tbody>
      </table>


    @else

    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           لا توجد مقالات في سلة المحذوفات!
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button> --}}
         </div>
    </div>
        
    @endif


    


  </div>

<!-- delete Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">حذف المقال بشكل نهائي</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            هل تريد حذف المقال بشكل نهائي؟
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">كلا</button>
          <a href="{{route('post.hdelete', ['id'=> $item->id])}}" type="button" class="btn btn-danger">نعم</a>
        </div>
      </div>
    </div>
  </div>
  @endsection