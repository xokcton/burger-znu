@extends('layouts.main')

@section('content')
    <div class="modal__window__form" id="modal__window__form">
        <form class="decor" action="/product" method="POST">
          @csrf
          <div class="form-left-decoration modal__window__form__decoration"></div>
          <div class="form-right-decoration modal__window__form__decoration"></div>
          <div class="circle__form__dot"></div>
          <div class="form-inner">
            <h3>Request a call</h3>
            <div id="modal__window__form__close">&#10005;</div>
            <input type="text" id="name" name="name" placeholder="Your name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <input type="text" id="phone" name="phone" placeholder="+1 666 666 666" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}">
            @error('phone')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <textarea name="address" id="address" rows="3" placeholder="Your address" class="@error('address') is-invalid @enderror">{{ old('address') }}</textarea>
            @error('address')
              <div class="invalid-feedback invalid-feedback__text">{{ $message }}</div>
            @enderror
            <button class="mail-btn">Request</button>
          </div>
        </form>
    </div>
    <main class="main lock-padding">
      <div class="container">
        <div class="products__styles__header__food">
          <div class="product__categories__links">
            <a class="product__categories__links__styles {{ request()->is('product') ? 'active__sublink' : '' }}" href="/product">All categories</a>
            <a class="product__categories__links__styles {{ request()->is('product/burgers') ? 'active__sublink' : '' }}" href="/product/burgers">burgers</a>
            <a class="product__categories__links__styles {{ request()->is('product/sauces') ? 'active__sublink' : '' }}" href="/product/sauces">sauces</a>
            <a class="product__categories__links__styles {{ request()->is('product/drinks') ? 'active__sublink' : '' }}" href="/product/drinks">drinks</a>
          </div>
          <div class="product__categories__links__second">
            <button id="order">order</button>
          </div>
        </div>
        <div class="products__styles">
          @foreach ($products as $product)
            @include('product._product')
          @endforeach
        </div>
        <div class="products__pagination">
          {{ $products->links() }}
        </div>
      </div>
    </main>
@endsection

@section('js')
    <script>
      $.noConflict();
      jQuery(function($){
        $("#phone").mask("+1 999-999-999");
      });

      let btn = document.getElementById("order");
      let closebtn = document.getElementById("modal__window__form__close");
      let modal = document.getElementById("modal__window__form");

      btn.addEventListener("click", () => {
          modal.classList.add("block__modal");
      });

      closebtn.addEventListener("click", () => {
          modal.classList.remove("block__modal");
      });
    </script>
@endsection
