@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
  <h1>Add Product</h1>
@stop

@section('content')
  @include('_messages')

  <form action="/admin/product" method="POST" enctype="multipart/form-data">
    @include('admin.product._form')

    <button class="btn btn-primary">Add</button>
  </form>
@stop