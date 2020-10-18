@extends('adminlte::page')

@section('title', 'Show Review #' . $reviews->id)

@section('content_header')
  <h1>Show Review by {{ $reviews->name }}</h1>
@stop

@section('content')
  <div class="row">
    <div class="mx-auto">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"> <b> {{ $reviews->name }} </b> </h5>
          <p class="card-text">{{ $reviews->review }}</p>
          <a href="/admin/review" class="btn btn-primary">Go back</a>
        </div>
      </div>
    </div>
  </div>
@stop
