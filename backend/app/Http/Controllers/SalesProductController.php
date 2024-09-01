<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SalesProduct;
use Illuminate\Http\Request;

class SalesProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data = $request->all();
        $salesProduct = new SalesProduct();

        $salesProduct->sale_id = $data['sale_id'];
        $salesProduct->product_id = $data['product_id'];
        $salesProduct->quantity = $data['quantity'];


        $save = $salesProduct->save();

        if ($save) {
            return response()->json([
                "message" => "Compra guardada!!!"
            ]);
        }

    }

    
 
    public function getProductsByUserAndSale($userId, $saleId)
    {
    
        $sale = Sale::where('id', $saleId)
                    ->where('user_id', $userId)
                    ->with('products')
                    ->first();

    
        if (!$sale) {
            return response()->json([
                "message" => "No se encontró la compra para este usuario."
            ], 404);
        }

        
        $products = $sale->products->map(function($product) {
            return [
                'product_name' => $product->name,
                'product_price' => $product->price,
                'quantity' => $product->pivot->quantity,
                'image' => $product->image,
                'subtotal' => $product->price * $product->pivot->quantity
            ];
        });

        return response()->json([
            "message" => "Productos obtenidos con éxito.",
            "products" => $products
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesProduct $salesProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesProduct $salesProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesProduct $salesProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesProduct $salesProduct)
    {
        //
    }
}
