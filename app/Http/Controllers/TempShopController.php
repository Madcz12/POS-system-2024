<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TempShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TempShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function tmp_shoppings(Request $request)
    {
        // busca un producto de acuerdo al código
        $product = Product::where('code', $request->code)->first();
        // si el producto existe...
        if ($product) {

            $session_id = session()->getId(); // sesión del usuario
            // consulta para verificar si el producto ingresado es el mismo
            // se pregunta por el id del producto y el id de la sesión
            $tmp_shop_exist = TempShop::where('product_id', $product->id)
                ->where('session_id', $session_id)->first();

            if ($tmp_shop_exist) {
                // si es el mismo se suma a la cola
                $tmp_shop_exist->quantity += $request->quantity;
                $tmp_shop_exist->save();
                return response()->json(['success' => true, 'message' => 'El producto fue encontrado']);
            } else {
                // de lo contrario se ingresa uno nuevo
                $tmp_shoppings = new TempShop();

                $tmp_shoppings->quantity = $request->quantity;
                $tmp_shoppings->product_id = $product->id;
                $tmp_shoppings->session_id = session()->getId(); // código de sesión

                $tmp_shoppings->save();
                return response()->json(['success' => true, 'message' => 'El producto fue encontrado']);
            }
        } else {
            return response()->json(['success' => true, 'message' => 'El producto NO fue encontrado']);
        }
    }


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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TempShop $tempShop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TempShop $tempShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TempShop $tempShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        echo $id;
        TempShop::destroy($id);
        return response()->json(['success' => true]);
    }
}
