@extends('layouts.main')

@section('content')
    <main class="main lock-padding">
        <div class="container">
            <div class="payment__inner__delivery_header contact__form__header">Checkout</div>
            <div class="checkout__content__container">
                @if ( session('cart') )
                    <div class="checkout__content__container__row__table">
                        @include('shop.__cart')
                    </div>
                    <div class="checkout__content__container__row__button">
                        <form action="/confirm" method="post" class="decor">
                            @csrf
                            <div class="form-left-decoration"></div>
                            <div class="form-right-decoration"></div>
                            <div class="circle__form__dot"></div>
                            <div class="form-inner">
                                <h3 class="checkout__content__container__row__button__h3">Add some information</h3>
                                <input type="name" id="name" name="name" placeholder="Your name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <textarea name="street" id="street" rows="3" placeholder="Your street" class="@error('street') is-invalid @enderror">{{ old('street') }}</textarea>
                                @error('street')
                                    <div class="invalid-feedback invalid-feedback__text">{{ $message }}</div>
                                @enderror
                                <button class="mail-btn">C.O.D.</button>
                            </div>
                        </form>
                    </div>
                @else
                    @include('_messages')
                    <br>
                    <p><b>U cant continue since u didnt pick any product!</b></p>
                @endif
            </div>
        </div>
    </main>
@endsection
