<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="uploads/burger.svg" type="image/x-icon">
    <link
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./slick/slick.css" />
    <link rel="stylesheet" href="./slick/slick-theme.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Burger House</title>
  </head>
  <body>
    <div class="scrollup">
      <i class="fa fa-chevron-up"></i>
    </div>

    <!-- Cart modal -->
    <div class="popup">
      <div class="popup-dialog">
        <div class="popup-content">
        <div class="popup-header">
          <!--   Svg иконка для закрытия окна  -->
        <svg class="popup__cross" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path
            d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z" />
        </svg>
        <p class="popup__title">Cart store</p>
      </div>
      <hr>
      <div class="popup-body">
        @include('shop._cart')
      </div>
      <hr>
      <div class="popup-footer">
        <button type="button" class="btn btn-danger clear-cart">Clear cart</button>
        <button type="button" class="btn btn-secondary" id="close__cart__modal__button">Close</button>
        <a href="/checkout" class="btn btn-primary">Checkout</a>
      </div>
      </div>
      </div>
    </div>

    <header class="header lock-padding">
      <div class="container">
        <div class="header__inner">
          <a href="/" id="logo"><img src="/uploads/logo.png" alt="Burger" /></a>

          <div class="logo__right">
            <div class="right__side">
              <button id="order__cart__button"><i class="fas fa-shopping-cart fa-2x"></i></button>
              <p class="logo__number">Express Delivery +1 234 567 890</p>
            </div>

            <nav class="nav">
              <a class="nav__link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
              <a class="nav__link {{ request()->is('product') ? 'active' : '' }}" href="/product">Food</a>
              <a class="nav__link {{ request()->is('payment') ? 'active' : '' }}" href="/payment">Payment</a>
              <a class="nav__link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact us</a>
            </nav>
          </div>
        </div>

        <div class="header__outer">
          <div class="intro__title__left">
            <p class="outer__text">
              It is a good time for the great taste of burgers
            </p>
            <h1 class="logo__h1">burger</h1>
            <h2 class="logo__h2">week</h2>
          </div>

          <div class="intro__title__right">
            <img class="cola" src="/uploads/Drinks.png" alt="cola" />
            <img class="burger" src="/uploads/BurgerImage.png" alt="burger" />
            <img class="frie" src="/uploads/FrenchFries.png" alt="frie" />
            <img
              class="cola_shadow"
              src="/uploads/ShadowCola.png"
              alt="cola_shadow"
            />
            <img
              class="burger_shadow"
              src="/uploads/ShadowBurger.png"
              alt="burger_shadow"
            />
            <img class="white_mess" src="/uploads/Glow.png" alt="white_mess" />
            <img class="red" src="/uploads/RedEllipse.png" alt="red" />
            <img class="circle" src="/uploads/Ellipse.png" alt="circle" />
            <p class="price_logo">$5.<span>49</span></p>
            <p class="only_logo">only</p>
          </div>
        </div>
      </div>
    </header>

    <div class="intro lock-padding">
      <div class="container"></div>
    </div>

    @yield('content')

    <footer class="footer lock-padding">
      <div class="container">
        <div class="footer__logo">
          <img src="/uploads/footer_logo.png" alt="Burger" />
        </div>
        <div class="footer__inner">
          <p class="footer__text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
            ipsum suspendisse ultrices gravida. Risus commodo viver ra maecenas
            accumsan lacus vel facilisis.
          </p>
          <div class="footer__location">
            <div class="footer__location__block">
              <img
                src="/uploads/Location.png"
                alt="Location"
                class="footer__loc-mail"
              />
              <p class="location__footer__text">
                Main Road, Building Name, Country
              </p>
            </div>
            <div class="footer__mail__block">
              <img
                src="/uploads/Email.png"
                alt="Email"
                class="footer__loc-mail"
              />
              <p class="mail__footer__text">
                info@companyname.com
              </p>
            </div>
          </div>
        </div>
        <div class="footer__footer__info">
          <div class="footer__privacy">
            <p class="footer__privacy__text">
              © Company Name 2020. All rights reserved.
            </p>
          </div>
          <div class="footer__socialmedia">
            <a
              class="footer__hover__inst"
              href="https://instagram.com"
              target="_blank"
              ><i class="fab fa-instagram fa-2x"></i
            ></a>
            <a
              class="footer__hover__face"
              href="https://facebook.com"
              target="_blank"
              ><i class="fab fa-facebook fa-2x"></i
            ></a>
            <a
              class="footer__hover__twit"
              href="https://twitter.com"
              target="_blank"
              ><i class="fab fa-twitter-square fa-2x"></i
            ></a>
            <a
              class="footer__hover__whats"
              href="https://whatsapp.com"
              target="_blank"
              ><i class="fab fa-whatsapp fa-2x"></i
            ></a>
          </div>
        </div>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="{{asset('/js/jquery.maskedinput.min.js')}}"></script>
    @yield('js')
    <script src="{{asset('/js/app.js')}}"></script>
  </body>
</html>
