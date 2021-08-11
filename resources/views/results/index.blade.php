@extends('layouts.app')

@section('content')

  <div class="container">

   
    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-6">نتائج التحليل</h1>
                  @if ($results->count() != 1)
                  <a href="{{route('result.create')}}" class="btn btn-success">رفع صورة نتيجة التحليل</a>
                  @endif
                  {{-- <a href="{{route('results.trashed')}}" class="btn btn-danger">Trashed Analysis Results</a> --}}

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
            <th scope="col">تاريخ الرفع</th>

            <th scope="col">حذف الصورة</th>

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
                <td>{{$item->created_at->diffForhumans()}}</td>
                <td>
                    {{-- <a class="btn btn-warning" href="{{route('post.edit', ['id', $item->id])}}"><i class="fas fa-pencil-alt"></i></a> --}}
                    {{-- <a class="btn btn-primary" href="{{route('post.show')}}"><i class="far fa-eye"></i></a> --}}
                    @if ($item->user_id == Auth::id())
                    <a class="btn btn-danger" href="{{route('result.destroy', ['id'=> $item->id])}}"><i class="far fa-trash-alt"></i></a>
   
                    @endif                    
                </td>
              </tr> 

            @endforeach
          
        </tbody>
      </table>


    @else

    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            لا توجد نتائج للتحيلات!
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button> --}}
         </div>
    </div>
        
    @endif


    


  </div>

  @endsection