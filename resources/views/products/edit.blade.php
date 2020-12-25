@extends('layouts.app')

@section('title', 'Add product')

@section('content')
<form method="POST" action="{{ route('products.update', compact('product')) }}">

  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$product->name}}">
    @include('partials.error-message', ['field' => 'name'])
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Description:</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{$product->description}}</textarea>
    @include('partials.error-message', ['field' => 'description'])
  </div>

  
  <div class="mb-3">
      <select multiple="multiple" name="categories[]" id="categories">
      @foreach($categories as $category)
          <option value="{{ $category->id}}">{{$category->name}}</option>
      @endforeach
    
    </select>
    </div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="avaible" name="avaible" value="1">
    <label class="form-check-label" for="avaible">Is sold</label>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
