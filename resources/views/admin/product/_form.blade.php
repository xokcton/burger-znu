@csrf

<div class="form-group">
  <label for="name">Product Name</label>
  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name ?? '') }}">
  @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="slug">Product Slug</label>
  <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $product->slug ?? '') }}">
  @error('slug')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="price">Product Price</label>
  <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price ?? '') }}">
  @error('price')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="description">Product Description</label>
  <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror"> {{ old('description', $product->description ?? '') }} </textarea>
  @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="cat_id">Category Name</label>
  <select name="cat_id" id="cat_id" class="form-control">
    <?php foreach ($categories as $category) : ?>
      <option value="<?= $category->id ?>" {{ !isset($product->category_id) ? '' : $product->category_id == $category->id ? 'selected' : '' }} >
        <?= $category->name ?>
      </option>
    <?php endforeach ?>
  </select>
</div>

<div class="form-group">
  <label for="img">Product Image</label>
  @if (isset($product->img))
    <img src="{{ $product->img }}" alt="$product->slug" style="width: 100px;">
  @endif
  <input type="file" id="img" name="img" class="form-control @error('img') is-invalid @enderror">
  @error('img')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>