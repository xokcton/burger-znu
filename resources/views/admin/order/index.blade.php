@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
  @include('_messages')

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Address</th>
        <th>Total Sum</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $item)
        <tr>
          <td> {{ $loop->iteration }} </td>
          <td> {{ $item->name }} </td>
          <td> {{ $item->street }} </td>
          <td> {{ $item->total_sum }} </td>
          <td class="table-buttons">
            <a href="{{ route('order.show', $item) }}" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('order.edit', $item) }}" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('order.destroy', $item) }}" method="POST">
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
      {{ $orders->links() }}
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin__custom.css">
@stop
