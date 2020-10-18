@extends('adminlte::page')

@section('title', 'Add Slide')

@section('content_header')
  <h1>Add Slide</h1>
@stop

@section('content')
  @include('_messages')

  <form action="/admin/slider" method="POST" enctype="multipart/form-data">
    @include('admin.slider._form')

    <button class="btn btn-primary">Add</button>
  </form>
@stop