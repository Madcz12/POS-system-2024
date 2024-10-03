<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
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
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:products,code,' . $id,
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'min_stock' => 'required',
            'max_stock' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
        ]);
        $product = Product::find($id);

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
            Storage::delete('public/' . $product->image);
            $product->image = $request->file('image')->store('products', 'public');
        }
        $product->update();
        return redirect()->route('admin.products.index')
            ->with('mensaje', 'Se Actualizó el producto correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Product::destroy($id);
        Storage::delete('public/' . $product->image);
        return redirect()->route('admin.products.index')
            ->with('mensaje', 'Se Eliminó el producto correctamente');
    }
}
