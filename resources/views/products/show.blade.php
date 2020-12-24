@extends('layouts.app')

@section('title', $product->name)

@section('content')
<h1>{{$product->name}}</h1>
<h6>Author: {{$product->author->name}}</h6>
<p class="fs-5 text">{{$product->description}}</p>


<h5>Category:</h5>
@foreach($product->categories as $category)
<p> {{$category->name}}</p>
@endforeach

<a href="/products/edit/{{$product->id}}" class="btn btn-primary">Edit</a>

@endsection