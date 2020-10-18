@extends('adminlte::page')

@section('title', 'Reviews')

@section('content_header')
    <h1>Reviews <a href="/admin/review/create" class="btn btn-primary btn-cm">
      <i class="fas fa-plus"></i>
      Add review
    </a> </h1>
@stop

@section('content')
  @include('_messages')

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Review</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($reviews as $item)
        <tr>
          <td> {{ $loop->iteration }} </td>
          <td> {{ $item->name }} </td>
          <td> {{ $item->review }} </td>
          <td class="table-buttons">
            <a href="{{ route('review.show', $item) }}" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('review.edit', $item) }}" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('review.destroy', $item) }}" method="POST">
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
      {{ $reviews->links() }}
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin__custom.css">
@stop