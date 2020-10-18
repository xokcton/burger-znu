@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cardd my__own__login__styles__logged__in">
                {{-- <div class="cardd-header">{{ __('Dashboard') }}</div> --}}

                <div class="cardd-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1  class="cardd my__own__login__styles__logged__in__h1"> {{ __('You are logged in!') }} </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
