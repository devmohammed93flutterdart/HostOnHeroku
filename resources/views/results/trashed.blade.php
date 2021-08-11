@extends('layouts.app')

@section('content')

  <div class="container">

   
    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-6">سلة المحذوفات</h1>
                  <a href="{{route('results')}}" class="btn btn-success">الرجوع لقائمة النتائج</a>
                </div>
              </div>
        </div>
    </div>

    @if ($results->count() > 0)
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">صورة نتيجة التحليل</th>
            <th scope="col">تاريخ الحذف</th>

            <th scope="col">حذف الصورة بشكل نهائي</th>
          </tr>
        </thead>
        <tbody>
          @php
              $results_count = 1;
          @endphp
            @foreach ($results as $item)
            <tr>
                <th scope="row">{{$results_count++}}</th>
                <td><img src="{{URL::asset($item->res_photo)}}" alt="{{$item->res_photo}}" class="img-thumbnail" width="100"></td>
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
            لا توجد أي نتيجة في سلة المحذوفات!
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
          <h5 class="modal-title" id="exampleModalLabel">delete permanently</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Do you want to delete permanently?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <a href="{{route('post.hdelete', ['id'=> $item->id])}}" type="button" class="btn btn-danger">Yes</a>
        </div>
      </div>
    </div>
  </div>
  @endsection