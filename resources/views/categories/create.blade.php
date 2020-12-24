@extends('layouts.app')

@section('title', 'Create category')

@section('content')
<form method="POST" action="/categories">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="name">
    @include('partials.error-message', ['field' => 'name'])
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection