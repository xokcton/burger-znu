@if ( session('cart') )
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Img</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Sum</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach (session('cart') as $product)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><img src="{{ $product['img'] }}" alt="{{$product['name']}}" style="width: 70px;"></td>
          <td>{{ $product['name'] }}</td>
          <td><b>$</b> {{ $product['price'] }}</td>
          <td>{{ $product['qty'] }}</td>
          <td><b>$</b> {{ $product['price'] * $product['qty'] }}</td>
          <td>
            <form class="product-delete" method="POST">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product['id'] }}">
              <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5" class="text-right"><b>Total Sum:</b></td>
        <td colspan="2"><b>$</b> {{session('totalSum')}}</td>
      </tr>
    </tfoot>
  </table>
@else
  <b>Your cart is empty!</b>
@endif
