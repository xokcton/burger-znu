@extends('adminlte::page')

@section('title', 'Edit Call #' . $calls->id)

@section('content_header')
  <h1>Edit Call by {{ $calls->name }}</h1>
@stop

@section('content')
  @include('_messages')

  <form action="{{ route('call.update', $calls->id) }}" method="POST" enctype="multipart/form-data">
    @include('admin.call._form')
    @method('PATCH')

    <button class="btn btn-primary">Edit</button>
  </form>
@stop