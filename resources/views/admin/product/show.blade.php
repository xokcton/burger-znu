@extends('adminlte::page')

@section('title', 'Show Product #' . $product->id)

@section('content_header')
  <h1>Show Product: {{ $product->name }}</h1>
@stop

@section('content')
  <div class="row">
    <div class="mx-auto">
      <div class="card" style="width: 18rem;">
        <img src="{{ $product->img }}" class="card-img-top" alt="{{ $product->slug }}">
        <div class="card-body">
          <h5 class="card-title"> <b> {{ $product->name }} </b> </h5>
          <p class="card-text">{{ $product->description }}.</p>
          <p class="card-text">Price: {{ $product->price }}<b>$</b></p>
          <a href="/admin/product" class="btn btn-primary">Go back</a>
        </div>
      </div>
    </div>
  </div>
@stop
