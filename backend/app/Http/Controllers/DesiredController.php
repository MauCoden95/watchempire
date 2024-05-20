<?php

namespace App\Http\Controllers;

use App\Models\Desired;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesiredController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function toggleDesired(Request $request, $user_id, $product_id)
    {
        $desired = Desired::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();

        if ($desired) {
            $desired->delete();
            return response()->json(['message' => 'Producto eliminado de deseados.']);
        } else {
            Desired::create([
                'user_id' => $user_id,
                'product_id' => $product_id
            ]);
            return response()->json(['message' => 'Producto añadido a deseados.']);
        }
    }

    public function getDesiredProducts($user_id)
    {
        $desiredProducts = Desired::where('user_id', $user_id)->pluck('product_id');
        return response()->json($desiredProducts);
    }

    public function getDesiredProductsByUserId($user_id)
    {
        $user = User::find($user_id);

        
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        
        $desiredProducts = $user->desireds()->get();

        return response()->json($desiredProducts);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function index()
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
    public function show(Desired $desired)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desired $desired)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desired $desired)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desired $desired)
    {
        //
    }
}
