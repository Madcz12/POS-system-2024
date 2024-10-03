<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        $enterprise = Enterprise::where('id', Auth::user()->enterprise_id)->first();
        return view('admin.suppliers.index', compact('suppliers', 'enterprise'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'ent_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'owner_name' => 'required',
            'owner_phone' => 'required',
        ]);

        $supplier = new Supplier();
        $supplier->ent_name = $request->ent_name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->owner_name = $request->owner_name;
        $supplier->owner_phone = $request->owner_phone;
        $supplier->enterprise_id = Auth::user()->enterprise_id;

        $supplier->save();

        return redirect()->route('admin.suppliers.index')->with('mensaje', 'Se ha creado un nuevo proveedor')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $suppliers = Supplier::find($id);
        return view('admin.suppliers.show', compact('suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suppliers = Supplier::find($id);
        return view('admin.suppliers.edit', compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ent_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'owner_name' => 'required',
            'owner_phone' => 'required',
        ]);

        $supplier = Supplier::find($id);
        $supplier->ent_name = $request->ent_name;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->owner_name = $request->owner_name;
        $supplier->owner_phone = $request->owner_phone;
        $supplier->enterprise_id = Auth::user()->enterprise_id;

        $supplier->update();

        return redirect()->route('admin.suppliers.index')->with('mensaje', 'Se ha Modificado el proveedor correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        Supplier::destroy($id);
        return redirect()->route('admin.suppliers.index')
            ->with('mensaje', 'Se Eliminó el proveedor correctamente');
    }
}
