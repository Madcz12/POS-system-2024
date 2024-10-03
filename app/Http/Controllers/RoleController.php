<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'name' => 'required|unique:roles'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = "web";
        $role->save();

        return redirect()->route('admin.roles.index')->with('mensaje', 'Se ha creado un nuevo rol')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::find($id);
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = $request->all();
        //return response()->json($datos);
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->guard_name = "web";
        $role->update();

        return redirect()->route('admin.roles.index')->with('mensaje', 'Se ha Modificado el nuevo rol')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('admin.roles.index')->with('mensaje', 'Se ha Eliminado el rol')
            ->with('icono', 'success');
    }
}
