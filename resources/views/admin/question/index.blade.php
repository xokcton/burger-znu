@extends('adminlte::page')

@section('title', 'Questions')

@section('content_header')
    <h1>Questions <a href="/admin/question/create" class="btn btn-primary btn-cm">
      <i class="fas fa-plus"></i>
      Add question
    </a> </h1>
@stop

@section('content')
  @include('_messages')

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Problem</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($questions as $item)
        <tr>
          <td> {{ $loop->iteration }} </td>
          <td> {{ $item->name }} </td>
          <td> {{ $item->email }} </td>
          <td> {{ $item->problem }} </td>
          <td class="table-buttons">
            <a href="{{ route('question.show', $item) }}" class="btn btn-success">
              <i class="fas fa-eye"></i>
            </a>
            <a href="{{ route('question.edit', $item) }}" class="btn btn-warning">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('question.destroy', $item) }}" method="POST">
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
      {{ $questions->links() }}
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin__custom.css">
@stop