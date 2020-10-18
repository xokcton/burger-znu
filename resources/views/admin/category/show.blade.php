@extends('adminlte::page')

@section('title', 'Show Category #' . $category->id)

@section('content_header')
  <h1>Show Category: {{ $category->name }}</h1>
@stop

@section('content')
  <div class="row">
    <div class="mx-auto">
      <div class="card" style="width: 18rem;">
        <img src="{{ $category->img }}" class="card-img-top" alt="{{ $category->slug }}">
        <div class="card-body">
          <h5 class="card-title"> <b> {{ $category->name }} </b> </h5>
          <p class="card-text">{{ $category->text }}.</p>
          <a href="/admin/category" class="btn btn-primary">Go back</a>
        </div>
      </div>
    </div>
  </div>
@stop
