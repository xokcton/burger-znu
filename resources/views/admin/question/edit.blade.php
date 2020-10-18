@extends('adminlte::page')

@section('title', 'Edit Question #' . $questions->id)

@section('content_header')
  <h1>Edit Question by {{ $questions->name }}</h1>
@stop

@section('content')
  @include('_messages')

  <form action="{{ route('question.update', $questions->id) }}" method="POST" enctype="multipart/form-data">
    @include('admin.question._form')
    @method('PATCH')

    <button class="btn btn-primary">Edit</button>
  </form>
@stop