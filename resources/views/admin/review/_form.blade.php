@csrf

<div class="form-group">
  <label for="name">Your Name</label>
  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $reviews->name ?? '') }}">
  @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="comment">Your Comment</label>
  <textarea name="comment" id="comment" cols="30" rows="10" class="form-control @error('comment') is-invalid @enderror"> {{ old('comment', $reviews->review ?? '') }} </textarea>
  @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

@if (isset($reviews))
  <div class="form-group">
    <label for="verified">Show comment?</label>
    <select name="verified" id="verified" class="form-control">
      <option value="1" {{ !isset($reviews->verified) ? '' : $reviews->verified == '1' ? 'selected' : '' }} >
        Allow
      </option>
      <option value="0" {{ !isset($reviews->verified) ? '' : $reviews->verified == '0' ? 'selected' : '' }} >
        Restrict
      </option>
    </select>
  </div>
@endif