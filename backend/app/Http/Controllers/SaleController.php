<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
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
        $sale = new Sale();
    
        $sale->user_id = $data["user_id"];
        $sale->total = $data["total"];
        $sale->date = $data["date"];
        $sale->hour = $data["hour"];
        $sale->payment_method = $data["payment_method"];
    
        $save_sale = $sale->save();
    
        if ($save_sale) {  
            return response()->json([
                "message" => "Compra guardada!!!",
                "sale_id" => $sale->id  
            ]);
        } else {
            return response()->json([
                "message" => "Error"
            ]);
        }
    }


    public function getSalesByUserID($user_id){
        $sales = Sale::where('user_id',$user_id)->get();

        return response()->json([
            "sales" => $sales
        ]);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
