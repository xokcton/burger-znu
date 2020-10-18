@extends('adminlte::page')

@section('title', 'Slides')

@section('content_header')
    <h1>Slides <a href="/admin/slider/create" class="btn btn-primary btn-cm">
      <i class="fas fa-plus"></i>
      Add slide
    </a> </h1>
@stop

@section('content')
  @include('_messages')

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Slug</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($slides as $item)
        <tr>
          <td> {{ $loop->iteration }} </td>
          <td> <img src="{{ $item->img }}" alt="{{ $item->slug }}" style="width: 100px;"> </td>
          <td> {{ $item->slug }} </td>
          <td class="table-buttons">
            <a href="{{ route('slider.show', $item) }}" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('slider.edit', $item) }}" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('slider.destroy', $item) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="container">
    <div class="row justify-content-center align-items-center">
      {{ $slides->links() }}
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin__custom.css">
@stop