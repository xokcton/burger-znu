@extends('adminlte::page')

@section('title', 'Add Question')

@section('content_header')
  <h1>Add Question</h1>
@stop

@section('content')
  @include('_messages')

  <form action="/admin/question" method="POST" enctype="multipart/form-data">
    @include('admin.question._form')

    <button class="btn btn-primary">Add</button>
  </form>
@stop