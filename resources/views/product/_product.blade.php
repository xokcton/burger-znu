<div class="card">
  <div class="imgBx">
    <img src="{{ $product->img }}" alt="{{ $product->slug }}">
  </div>
  <div class="contentBx">
    <h3>{{ $product->name }}</h3>
    <div>
        <h2 class="price">$ {{ $product->price }}</h2>
        <form action="/" class="add-to-cart">
            @csrf
            <input type="number" name="qty" value="1" class="number_qty">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button class="add__to__cart__success__button">Add</button>
        </form>
    </div>
    <p>{{ $product->description }}</p>
  </div>
</div>
