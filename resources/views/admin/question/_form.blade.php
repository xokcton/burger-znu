@csrf

<div class="form-group">
  <label for="name">Your Name</label>
  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $questions->name ?? '') }}">
  @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="email">Your Email</label>
  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $questions->email ?? '') }}">
  @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="form-group">
  <label for="problem">Your Problem</label>
  <textarea name="problem" id="problem" cols="30" rows="10" class="form-control @error('problem') is-invalid @enderror"> {{ old('problem', $questions->problem ?? '') }} </textarea>
  @error('problem')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
