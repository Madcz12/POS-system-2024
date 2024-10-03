<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EnterpriseController extends Controller
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
        // DB se usa cuando se tienen tablas que no necesitan modelos
        $country = DB::table('countries')->get();
        $state = DB::table('states')->get();
        $city = DB::table('cities')->get();
        $currency = DB::table('currencies')->get();
        return view('admin.enterprises.create', compact('country', 'state', 'city', 'currency'));
    }

    public function search_state($id_country)
    {
        try {
            $states = DB::table('states')->where('country_id', $id_country)->get();
            return view('admin.enterprises.charge_states', compact('states'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }

    public function search_city($id_state)
    {
        try {
            $cities = DB::table('cities')->where('state_id', $id_state)->get();
            return view('admin.enterprises.charge_cities', compact('cities'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'name' => 'required',
            'ent_type' => 'required',
            'nit' => 'required|unique:enterprises',
            'phone' => 'required',
            'email' => 'required|unique:enterprises',
            'tax_ammount' => 'required',
            'tax_name' => 'required',
            'currency' => 'required',
            'address' => 'required',
            'post_code' => 'required',
            //'logo' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $enterprise = new Enterprise();

        $enterprise->country = $request->get('country');
        $enterprise->state = $request->get('state');
        $enterprise->city = $request->get('city');
        $enterprise->name = $request->get('name');
        $enterprise->ent_type = $request->get('ent_type');
        $enterprise->nit = $request->get('nit');
        $enterprise->phone = $request->get('phone');
        $enterprise->email = $request->get('email');
        $enterprise->tax_ammount = $request->get('tax_ammount');
        $enterprise->tax_name = $request->get('tax_name');
        $enterprise->currency = $request->get('currency');
        $enterprise->address = $request->get('address');
        $enterprise->post_code = $request->get('post_code');
        $enterprise->logo = $request->file('logo')->store('logos', 'public');
        //return $enterprise;
        $enterprise->save();

        $user = new User();
        $user->name = "Admin";
        $user->email = $request->email;
        $user->password = Hash::make($request['nit']);
        $user->enterprise_id = $enterprise->id;
        //guardamos el usuario
        $user->save();
        $user->assignRole('ADMINISTRADOR');

        Auth::login($user);

        return redirect()->route('admin.index')
            ->with('mensaje', 'Se registro la empresa correctamente');
        //return "guardado";
    }

    /**
     * Display the specified resource.
     */
    public function show(Enterprise $enterprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enterprise $enterprise)
    {
        //
        $country = DB::table('countries')->get();
        $state = DB::table('states')->get();
        $city = DB::table('cities')->get();
        $currency = DB::table('currencies')->get();
        $enterprise_id = Auth::user()->enterprise_id;
        $enterprise = Enterprise::where('id', $enterprise_id)->first();
        $select_state = DB::table('states')->where('country_id', $enterprise->country)->get();
        $select_city = DB::table('cities')->where('state_id', $enterprise->state)->get();
        return view('admin.configs.edit', compact('country', 'state', 'city', 'currency', 'enterprise', 'select_state', 'select_city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'name' => 'required',
            'ent_type' => 'required',
            'nit' => 'required|unique:enterprises,nit,' . $id,
            'phone' => 'required',
            'email' => 'required|unique:enterprises,email,' . $id,
            'tax_ammount' => 'required',
            'tax_name' => 'required',
            'currency' => 'required',
            'address' => 'required',
            'post_code' => 'required',
        ]);

        $enterprise = Enterprise::find($id);

        $enterprise->country = $request->get('country');
        $enterprise->state = $request->get('state');
        $enterprise->city = $request->get('city');
        $enterprise->name = $request->get('name');
        $enterprise->ent_type = $request->get('ent_type');
        $enterprise->nit = $request->get('nit');
        $enterprise->phone = $request->get('phone');
        $enterprise->email = $request->get('email');
        $enterprise->tax_ammount = $request->get('tax_ammount');
        $enterprise->tax_name = $request->get('tax_name');
        $enterprise->currency = $request->get('currency');
        $enterprise->address = $request->get('address');
        $enterprise->post_code = $request->get('post_code');

        if ($request->hasFile('logo')) {
            Storage::delete('public/' . $enterprise->logo);
            $enterprise->logo = $request->file('logo')->store('logos', 'public');
        }
        //return $enterprise;
        $enterprise->update();
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->name = "Admin";
        $user->email = $request->email;
        $user->password = Hash::make($request['nit']);
        $user->enterprise_id = $enterprise->id;
        //guardamos el usuario
        $user->update();

        Auth::login($user);

        return redirect()->route('admin.index')
            ->with('mensaje', 'Se modificaron los datos de la empresa correctamente')
            ->with('icono', 'success');
        //return "guardado";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enterprise $enterprise)
    {
        //
    }
}
