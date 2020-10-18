@extends('adminlte::page')

@section('title', 'Show Question #' . $questions->id)

@section('content_header')
  <h1>Show Question by {{ $questions->name }}</h1>
@stop

@section('content')
  <div class="row">
    <div class="mx-auto">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"> <b> {{ $questions->name }} </b> </h5>
          <p class="card-text">{{ $questions->email }}</p>
          <p class="card-text">{{ $questions->problem }}?</p>
          <a href="/admin/question" class="btn btn-primary">Go back</a>
        </div>
      </div>
    </div>
  </div>
@stop
