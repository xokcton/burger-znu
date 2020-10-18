@extends('layouts.main')

@section('content')
    <main class="main lock-padding">
      <div class="container">
        <div class="payment__inner__delivery_header">
          Payment and delivery
        </div>
        <div class="payment__inner__delivery__delivery">
          <i class="fas fa-credit-card fa-6x"></i>
          <div class="payment__inner__delivery__wrap">
            <h3 class="payment__inner__delivery__h3">Payment</h3>
            <p class="payment__inner__delivery__p">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod,
              fuga? Itaque obcaecati ipsa facere veritatis ab nesciunt,
              voluptates architecto provident distinctio aliquid? Accusantium
              eveniet sapiente nostrum consequuntur! Iusto, recusandae
              blanditiis.
            </p>
          </div>
        </div>
        <div class="payment__inner__delivery__delivery">
          <i class="fas fa-truck fa-6x"></i>
          <div class="payment__inner__delivery__wrap">
            <h3 class="payment__inner__delivery__h3">Delivery</h3>
            <p class="payment__inner__delivery__p">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod,
              fuga? Itaque obcaecati ipsa facere veritatis ab nesciunt,
              voluptates architecto provident distinctio aliquid? Accusantium
              eveniet sapiente nostrum consequuntur! Iusto, recusandae
              blanditiis.
            </p>
          </div>
        </div>

        <div class="payment__inner__delivery__comment__form">

            @include('_messages')

            <form class="decor" action="/payment" method="POST">
              @csrf
              <div class="form-left-decoration"></div>
              <div class="form-right-decoration"></div>
              <div class="circle__form__dot"></div>
              <div class="form-inner">
                <h3>Leave comment</h3>
                <input type="text" id="name" name="name" placeholder="Your name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <textarea name="comment" id="comment" rows="3" placeholder="Your comment" class="@error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                @error('comment')
                  <div class="invalid-feedback invalid-feedback__text">{{ $message }}</div>
                @enderror
                <button class="mail-btn">Leave</button>
              </div>
            </form>
          </div>

          <div class="payment__inner__delivery__comment__show">
            @foreach ($comments as $comment)
              @include('payment._payment')
            @endforeach
          </div>
      </div>
    </main>
@endsection
