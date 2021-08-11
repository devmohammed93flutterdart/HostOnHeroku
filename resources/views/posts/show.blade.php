@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-6">{{}}</h1>
                  <a href="{{route('posts')}}" class="btn btn-primary">كل المقالات</a>
                </div>
              </div>
        </div>
    </div>

    
        <div class="row">
            <div class="card text-center">
                <div class="card-header">
                  Featured
                </div>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-muted">
                  2 days ago
                </div>
              </div>
        </div>

  </div>

  @endsection