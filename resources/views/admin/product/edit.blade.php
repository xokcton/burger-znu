@extends('adminlte::page')

@section('title', 'Edit Product #' . $product->id)

@section('content_header')
  <h1>Edit Product: {{ $product->name }}</h1>
@stop

@section('content')
  @include('_messages')

  <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @include('admin.product._form')
    @method('PATCH')

    <button class="btn btn-primary">Edit</button>
  </form>
@stop