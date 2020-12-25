<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = Product::with('categories')
    ->where('avaible', 1)
    ->orderBy('id', 'desc')
    ->paginate(15);
     
    return view('products.index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();

    return view('products.create', compact('categories'));
  }
 

  /**
   * Store a newly created resource in storage.
   *
   * @param  App\Http\Requests\CreateProductRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateProductRequest $request)
  {
    $data = $request->validated();
    $product = auth()->user()->products()->create($data);
    $product->categories()->attach($request->categories);

    return redirect('/');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    
    return view('products.show', compact('product'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    $categories = Category::all();

    return view('products.edit', compact('product', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(CreateProductRequest $request, Product $product)
  {
    
    $data = $request->validated();
    $product = Product::updateOrCreate([
      'id' => $product->id
    ], $data);
    $product->categories()->attach($request->categories);
    
    return redirect('/');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    //
  }

}
