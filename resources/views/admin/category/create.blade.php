@extends('adminlte::page')

@section('title', 'Add Category')

@section('content_header')
  <h1>Add Category</h1>
@stop

@section('content')
  @include('_messages')

  <form action="/admin/category" method="POST" enctype="multipart/form-data">
    @include('admin.category._form')

    <button class="btn btn-primary">Add</button>
  </form>
@stop