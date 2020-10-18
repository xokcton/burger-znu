@extends('adminlte::page')

@section('title', 'Edit Category #' . $category->id)

@section('content_header')
  <h1>Edit Category: {{ $category->name }}</h1>
@stop

@section('content')
  @include('_messages')

  <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @include('admin.category._form')
    @method('PATCH')

    <button class="btn btn-primary">Edit</button>
  </form>
@stop