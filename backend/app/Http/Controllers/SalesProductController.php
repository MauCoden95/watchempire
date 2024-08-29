<?php

namespace App\Http\Controllers;

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
