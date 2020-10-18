@csrf

<div class="form-group">
  <label for="name">Your Name</label>
  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $calls->name ?? '') }}">
  @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="phone">Your Phone</label>
  <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $calls->phone ?? '') }}">
  @error('phone')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="address">Your Address</label>
  <textarea name="address" id="address" cols="30" rows="10" class="form-control @error('address') is-invalid @enderror"> {{ old('address', $calls->address ?? '') }} </textarea>
  @error('address')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>