<h1>New Order <b>#{{ $id }}</b></h1>
<p><b>From:</b> {{ $name }}</p>
<p><b>Address:</b> {{ $street }}</p>
<p><b>Total Sum:</b> {{ $totalSum }}</p>

<hr>

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Img</th>
      <th>Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Sum</th>
    </tr>
  </thead>
  <tbody>
    @foreach (session('cart') as $product)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td><img src="{{env('APP_URL')}}/{{ $product['img'] }}" alt="{{$product['name']}}" style="width: 70px;"></td>
        <td>{{ $product['name'] }}</td>
        <td>{{ $product['price'] }}</td>
        <td>{{ $product['qty'] }}</td>
        <td>{{ $product['price'] * $product['qty'] }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
