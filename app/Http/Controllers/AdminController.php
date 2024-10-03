<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enterprise;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    //
    public function index()
    {
        $total_roles = Role::count();
        $total_users = User::count();
        $total_categories = Category::count();
        $total_products = Product::count();
        $total_suppliers = Supplier::count();
        $enterprise_id = Auth::check() ? Auth::user()->enterprise_id : redirect()->route('login')->send();
        $enterprise = Enterprise::where('id', $enterprise_id)->first();
        return view('admin.index', compact('enterprise', 'total_roles', 'total_users', 'total_categories', 'total_products', 'total_suppliers'));
    }
}
