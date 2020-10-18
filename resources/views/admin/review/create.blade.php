@extends('adminlte::page')

@section('title', 'Add Review')

@section('content_header')
  <h1>Add Review</h1>
@stop

@section('content')
  @include('_messages')

  <form action="/admin/review" method="POST" enctype="multipart/form-data">
    @include('admin.review._form')

    <button class="btn btn-primary">Add</button>
  </form>
@stop