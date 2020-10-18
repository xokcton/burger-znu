@extends('layouts.main')

@section('content')
    <main class="main lock-padding">
      <div class="container">

        <div class="payment__inner__delivery_header contact__form__header">Do you have questions? Ask them...</div>

        <div class="contact__from__wrap">

          <div class="contact__form__rest__left">
            <div class="contact__form__rest__left__phone1">
              <p class="contact__form__rest__left__phones"> +1 131 313 131</p>
              <a target="_blank" class="contact__form__rest__left__links contact__form__rest__left__links__whatsapp" href="https://whatsapp.com">WhatsApp</a> / <a target="_blank" class="contact__form__rest__left__links contact__form__rest__left__links__viber" href="https://viber.com">Viber</a>
            </div>
            <div class="contact__form__rest__left__phone2">
              <p class="contact__form__rest__left__phones"> +1 666 666 666</p>
              <a target="_blank" class="contact__form__rest__left__links contact__form__rest__left__links__whatsapp" href="https://whatsapp.com">WhatsApp</a> / <a target="_blank" class="contact__form__rest__left__links contact__form__rest__left__links__viber" href="https://viber.com">Viber</a>
            </div>
            <p class="contact__form__rest__left__mail">info@companyname.com</p>
            <div class="contact__form__rest__left__social">
              <a
              class="footer__hover__inst"
              href="https://instagram.com"
              target="_blank"
              ><i class="fab fa-instagram fa-3x"></i
            ></a>
            <a
              class="footer__hover__face"
              href="https://facebook.com"
              target="_blank"
              ><i class="fab fa-facebook fa-3x"></i
            ></a>
            <a
              class="footer__hover__twit"
              href="https://twitter.com"
              target="_blank"
              ><i class="fab fa-twitter-square fa-3x"></i
            ></a>
            <a
              class="footer__hover__whats"
              href="https://whatsapp.com"
              target="_blank"
              ><i class="fab fa-whatsapp fa-3x"></i
            ></a>
            </div>
          </div>

          <div class="contact__form__rest__right">

            @include('_messages')

            <form class="decor" action="/contact" method="POST">
              @csrf
              <div class="form-left-decoration"></div>
              <div class="form-right-decoration"></div>
              <div class="circle__form__dot"></div>
              <div class="form-inner">
                <h3>Email us</h3>
                <input type="text" id="name" name="name" placeholder="Your name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <input type="email" id="email" name="email" placeholder="Your email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <textarea name="problem" id="problem" rows="3" placeholder="Your problem" class="@error('problem') is-invalid @enderror">{{ old('problem') }}</textarea>
                @error('problem')
                  <div class="invalid-feedback invalid-feedback__text">{{ $message }}</div>
                @enderror
                <button class="mail-btn">Send</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </main>
@endsection
