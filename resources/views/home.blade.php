@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('posts')}}" class="btn btn-primary">عرض المقالات</a>
                        </div>
    
                        <div class="col">
                            <a href="{{route('results')}}" class="btn btn-success">رفع صورة لنتائج التحليل</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
