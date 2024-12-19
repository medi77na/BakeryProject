<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::paginate(6);
        $products = Product::all();

        return view('dashboard', [
            'products' => $products,
            'isAdmin' => auth::user()->is_admin,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        $product->update($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::table('products')->where('id', $product->id)->delete();
        return redirect()->route(route: 'products.index')
            ->with('success', value: 'Product deleted successfully.');
    }

    public function togglePublished($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Toggle the 'published' property state
        $product->published = !$product->published;

        // Save the change
        $product->save();

        return redirect()->route(route: 'products.index')
            ->with('success', value: 'Product published status was updated successfully.');
    }
}
