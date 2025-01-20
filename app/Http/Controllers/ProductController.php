<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    return view('products.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('products.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductRequest $request) {
    $request->validate([
      'name' => ['required', 'max:100'],
      'price' => 'required',
      'description' => 'required',
    ]);

    $product = new Product;
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->save();

    foreach ($request->file('images') as $image_file) {
      $image = new ProductImage;
      $path = $image_file->store('/images', ['disk' => 'my_files']);
      $image->image_url = $path;
      $image->product_id = $product->id;
      $image->save();
    }

    return redirect()->route('products.index')->with('message', 'New product successfully added!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product) {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductRequest $request, Product $product) {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product) {
    //
  }
}
