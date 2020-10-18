@csrf

<div class="form-group">
  <label for="name">Your Name</label>
  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $orders->name ?? '') }}">
  @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="street">Your Address</label>
  <textarea name="street" id="street" cols="30" rows="10" class="form-control @error('street') is-invalid @enderror"> {{ old('street', $orders->street ?? '') }} </textarea>
  @error('street')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
