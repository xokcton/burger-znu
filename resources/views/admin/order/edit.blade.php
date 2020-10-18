@extends('adminlte::page')

@section('title', 'Edit Order #' . $orders->id)

@section('content_header')
  <h1>Edit Order by {{ $orders->name }}</h1>
@stop

@section('content')
  @include('_messages')

  <form action="{{ route('order.update', $orders->id) }}" method="POST" enctype="multipart/form-data">
    @include('admin.order._form')
    @method('PATCH')

    <button class="btn btn-primary">Edit</button>
  </form>
@stop
