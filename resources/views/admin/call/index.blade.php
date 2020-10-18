@extends('adminlte::page')

@section('title', 'Calls')

@section('content_header')
    <h1>Calls <a href="/admin/call/create" class="btn btn-primary btn-cm">
      <i class="fas fa-plus"></i>
      Add call
    </a> </h1>
@stop

@section('content')
  @include('_messages')

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($calls as $item)
        <tr>
          <td> {{ $loop->iteration }} </td>
          <td> {{ $item->name }} </td>
          <td> {{ $item->phone }} </td>
          <td> {{ $item->address }} </td>
          <td class="table-buttons">
            <a href="{{ route('call.show', $item) }}" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('call.edit', $item) }}" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('call.destroy', $item) }}" method="POST">
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
      {{ $calls->links() }}
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin__custom.css">
@stop