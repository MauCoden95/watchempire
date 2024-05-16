<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function allProducts()
    {
        $allProducts = Product::all();
        
        return response()->json($allProducts);
    }


    public function randomProducts()
    {
        $randomProducts = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.id', 'categories.name as category_name', 'products.name', 'products.price', 'products.image', 'products.stock')
            ->inRandomOrder()
            ->take(6)
            ->get();


        return response()->json($randomProducts);
    }


    public function oneProduct()
    {
        $oneProduct = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.id', 'categories.name as category_name', 'products.name', 'products.price', 'products.image', 'products.description')
            ->inRandomOrder()
            ->take(1)
            ->get();


        return response()->json($oneProduct);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
