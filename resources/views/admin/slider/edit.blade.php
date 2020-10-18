@extends('adminlte::page')

@section('title', 'Edit Slide #' . $slides->id)

@section('content_header')
  <h1>Edit Slide: {{ $slides->slug }}</h1>
@stop

@section('content')
  @include('_messages')

  <form action="{{ route('slider.update', $slides->id) }}" method="POST" enctype="multipart/form-data">
    @include('admin.slider._form')
    @method('PATCH')

    <button class="btn btn-primary">Edit</button>
  </form>
@stop