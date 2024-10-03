<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shopping;
use App\Models\Supplier;
use App\Models\TempShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shoppings = Shopping::with(['product', 'supplier'])->get();
        return view('admin.shopping.index', compact('shoppings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('enterprise_id', Auth::user()->enterprise_id)->get();
        $suppliers = Supplier::where('enterprise_id', Auth::user()->enterprise_id)->get();

        $session_id = session()->getId();

        $temp_shoppings = TempShop::where('session_id', $session_id)->get();

        return view('admin.shopping.create', compact('products', 'suppliers', 'temp_shoppings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products',
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'min_stock' => 'required',
            'max_stock' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
        ]);
        $product = new Product();

        $product->category_id = $request->category_id;
        $product->enterprise_id = Auth::user()->enterprise_id;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->min_stock = $request->min_stock;
        $product->max_stock = $request->max_stock;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->ingreso_date = now();
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }
        $product->save();
        return redirect()->route('admin.products.index')
            ->with('mensaje', 'Se registro el producto correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shopping $shopping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shopping $shopping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shopping $shopping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shopping $shopping)
    {
        //
    }
}
