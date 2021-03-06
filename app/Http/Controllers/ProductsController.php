<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Products::all();
        return view('products.registerProduct', compact('products'));
    }

    public function addProduct(Request $request)
    {

        $validated = $request->validate([
            'pname' => 'required|max:255|unique:Products',
            'desc' => 'required|max:255',
            'unit' => 'required|max:10',
            'price' => 'required|numeric',
        ]);

        Products::insert([
            'pname' => $validated['pname'],
            'description' => $validated['desc'],
            'unit' => $validated['unit'],
            'price' => $validated['price'],
        ]);

        return redirect('/products')->with('status', 'Product added successfully');
    }
}
