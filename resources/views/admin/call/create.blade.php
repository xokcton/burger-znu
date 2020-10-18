@extends('adminlte::page')

@section('title', 'Add Call')

@section('content_header')
  <h1>Add Call</h1>
@stop

@section('content')
  @include('_messages')

  <form action="/admin/call" method="POST" enctype="multipart/form-data">
    @include('admin.call._form')

    <button class="btn btn-primary">Add</button>
  </form>
@stop

@section('js')
  <script src="{{asset('/js/jquery.maskedinput.min.js')}}"></script>
  <script>
    $.noConflict();
      jQuery(function($){
        $("#phone").mask("+1 999-999-999");
      });
  </script>
@stop