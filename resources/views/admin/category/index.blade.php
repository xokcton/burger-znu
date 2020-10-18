@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories <a href="/admin/category/create" class="btn btn-primary btn-cm">
      <i class="fas fa-plus"></i>
      Add category
    </a> </h1>
@stop

@section('content')
  @include('_messages')

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Text</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $item)
        <tr>
          <td> {{ $loop->iteration }} </td>
          <td> <img src="{{ $item->img }}" alt="{{ $item->slug }}" style="width: 100px;"> </td>
          <td> {{ $item->name }} </td>
          <td> {{ $item->text }} </td>
          <td class="table-buttons">
            <a href="{{ route('category.show', $item) }}" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('category.edit', $item) }}" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('category.destroy', $item) }}" method="POST">
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
      {{ $categories->links() }}
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin__custom.css">
@stop