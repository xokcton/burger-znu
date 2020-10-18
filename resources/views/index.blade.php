@extends('layouts.main')

@section('content')
    <main class="main lock-padding">
      <div class="container">
        <div class="main__intro">
          Always Tasty Burger
        </div>
        <h2 class="main__intro__header">
          Choose & Enjoy
        </h2>
        <div class="main__intro__text">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum
          suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
          lacus vel facilisis.
        </div>
        <div class="main__intro__categories">
          <div class="main__intro__cat">
            <a class="main__intro__cat__link" href="/product/burgers">
              <img
                class="main__intro__cat__img"
                src="{{ $categories[0]->img }}"
                alt="Souses"
              />
            <h4 class="main__intro__cat__header">{{ $categories[0]->name }}</h4>
              <p class="main__intro__cat__text">
                {{ $categories[0]->text }}
              </p>
            </a>
          </div>
          <div class="main__intro__cat">
            <a class="main__intro__cat__link" href="/product/sauces">
              <img
                class="main__intro__cat__img"
                src="{{ $categories[1]->img }}"
                alt="Souses"
              />
              <h4 class="main__intro__cat__header">{{ $categories[1]->name }}</h4>
              <p class="main__intro__cat__text">
                {{ $categories[1]->text }}
              </p>
            </a>
          </div>
          <div class="main__intro__cat">
            <a class="main__intro__cat__link" href="/product/drinks">
              <img
                class="main__intro__cat__img"
                src="{{ $categories[2]->img }}"
                alt="Souses"
              />
              <h4 class="main__intro__cat__header">{{ $categories[2]->name }}</h4>
              <p class="main__intro__cat__text">
                {{ $categories[2]->text }}
              </p>
            </a>
          </div>
        </div>
        <div class="main__outro__carusel">
          <div class="main__outro__carusel__header">
            Upcoming Events
          </div>
          <div class="all">

            @foreach ($slides as $slide)
              <div><img src="{{ $slide->img }}" alt="{{ $slide->slug }}" /></div>
            @endforeach

            {{-- <input checked type="radio" name="respond" id="desktop" />
            <article id="slider">
              <input checked type="radio" name="slider" id="switch1" />
              <input type="radio" name="slider" id="switch2" />
              <input type="radio" name="slider" id="switch3" />
              <input type="radio" name="slider" id="switch4" />
              <input type="radio" name="slider" id="switch5" />
              <div id="slides">
                <div id="overflow">
                  <div class="image">
                    <article><img src="{{ $slides[0]->img }}" alt="{{ $slides[0]->slug }}" /></article>
                    <article><img src="{{ $slides[1]->img }}" alt="{{ $slides[1]->slug }}" /></article>
                    <article><img src="{{ $slides[2]->img }}" alt="{{ $slides[2]->slug }}" /></article>
                    <article><img src="{{ $slides[3]->img }}" alt="{{ $slides[3]->slug }}" /></article>
                    <article><img src="{{ $slides[4]->img }}" alt="{{ $slides[4]->slug }}" /></article>
                  </div>
                </div>
              </div>
              <div id="controls">
                <label for="switch1"></label>
                <label for="switch2"></label>
                <label for="switch3"></label>
                <label for="switch4"></label>
                <label for="switch5"></label>
              </div>
              <div id="active">
                <label for="switch1"></label>
                <label for="switch2"></label>
                <label for="switch3"></label>
                <label for="switch4"></label>
                <label for="switch5"></label>
              </div>
            </article> --}}
          </div>
        </div>
      </div>
    </main>
@endsection

@section('js')
  <script>
    $('.all').slick();
  </script>
@endsection
