<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display a listing of the products.
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Store a newly created product in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
            $request->merge(['photo_path' => $path]);
        }

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    // Display the specified product.
    public function show(Product $product)
    {
        return response()->json($product);
    }

    // Update the specified product in storage.
    public function update(Request $request, Product $product)
    {   
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete the old photo if exists
            if ($product->photo_path) {
                Storage::disk('public')->delete($product->photo_path);
            }
            $path = $request->file('photo')->store('images', 'public');
            $request->merge(['photo_path' => $path]);
        }

        $product->update($request->all());

        return response()->json($product);
    }

    // Remove the specified product from storage.
    public function destroy(Product $product)
    {
        if ($product->photo_path) {
            Storage::disk('public')->delete($product->photo_path);
        }

        $product->delete();

        return response()->json(null, 204);
    }
}
