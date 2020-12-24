@extends('layouts.app')

@section('title', 'Store')

@section('content')

<h1>Products:</h1>
<ul>
  @foreach ($products as $product)
    <li>
      <a href="{{route('products.show', ['product' => $product->id])}}">
        {{$product->name}}  --{{$product->author->name}}
      </a>
    </li>
  @endforeach
</ul>
{{ $products->links() }}

@endsection
