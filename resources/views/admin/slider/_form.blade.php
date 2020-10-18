@csrf

<div class="form-group">
  <label for="slug">Slider Slug</label>
  <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $slides->slug ?? '') }}">
  @error('slug')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="img">Slider Image</label>
  @if (isset($slides->img))
    <img src="{{ $slides->img }}" alt="$slides->slug" style="width: 100px;">
  @endif
  <input type="file" id="img" name="img" class="form-control @error('img') is-invalid @enderror">
  @error('img')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>