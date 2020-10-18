@extends('adminlte::page')

@section('title', 'Show Order #' . $orders->id)

@section('content_header')
  <h1>Show Order by {{ $orders->name }}</h1>
@stop

@section('content')
  <div class="row">
    <div class="mx-auto">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><b>Name: </b>{{ $orders->name }}</h5>
          <p class="card-text"><b>Address: </b>{{ $orders->street }}</p>
          <p class="card-text"><b>Total Sum: $</b> {{ $orders->total_sum }}</p>
          <a href="/admin/order" class="btn btn-primary">Go back</a>
        </div>
      </div>
    </div>
  </div>
@stop
