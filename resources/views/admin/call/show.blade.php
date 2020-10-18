@extends('adminlte::page')

@section('title', 'Show Call #' . $calls->id)

@section('content_header')
  <h1>Show Call by {{ $calls->name }}</h1>
@stop

@section('content')
  <div class="row">
    <div class="mx-auto">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"> <b> {{ $calls->name }} </b> </h5>
          <p class="card-text">Phone: {{ $calls->phone }}</p>
          <p class="card-text">Address: {{ $calls->address }}.</p>
          <a href="/admin/call" class="btn btn-primary">Go back</a>
        </div>
      </div>
    </div>
  </div>
@stop
