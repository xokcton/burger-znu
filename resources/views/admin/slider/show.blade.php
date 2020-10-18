@extends('adminlte::page')

@section('title', 'Show Slide #' . $slides->id)

@section('content_header')
  <h1>Show Slide: {{ $slides->slug }}</h1>
@stop

@section('content')
  <div class="row">
    <div class="mx-auto">
      <div class="card" style="width: 18rem;">
        <img src="{{ $slides->img }}" class="card-img-top" alt="{{ $slides->slug }}">
        <div class="card-body">
          <h5 class="card-title"> <b> {{ $slides->slug }} </b> </h5><br><br>
          <a href="/admin/slider" class="btn btn-primary">Go back</a>
        </div>
      </div>
    </div>
  </div>
@stop
