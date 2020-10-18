@extends('adminlte::page')

@section('title', 'Edit Review #' . $reviews->id)

@section('content_header')
  <h1>Edit Review by {{ $reviews->name }}</h1>
@stop

@section('content')
  @include('_messages')

  <form action="{{ route('review.update', $reviews->id) }}" method="POST" enctype="multipart/form-data">
    @include('admin.review._form')
    @method('PATCH')

    <button class="btn btn-primary">Edit</button>
  </form>
@stop