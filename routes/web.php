<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/create-enterprise', [App\Http\Controllers\EnterpriseController::class, 'create'])->name('admin.enterprises.create');


Route::get('/create-enterprise/country/{id_country}', [App\Http\Controllers\EnterpriseController::class, 'search_state'])->name('admin.enterprises.create.search_state');
Route::get('/create-enterprise/state/{id_state}', [App\Http\Controllers\EnterpriseController::class, 'search_city'])->name('admin.enterprises.create.search_city');

Route::post('/create-enterprise/create', [App\Http\Controllers\EnterpriseController::class, 'store'])->name('admin.enterprises.store');

// rutas config
Route::get('/admin/config', [App\Http\Controllers\EnterpriseController::class, 'edit'])->name('admin.configs.edit')->middleware('auth');
Route::get('/admin/config/country/{id_country}', [App\Http\Controllers\EnterpriseController::class, 'search_state'])->name('admin.enterprises.create.search_state');
Route::get('/admin/config/state/{id_state}', [App\Http\Controllers\EnterpriseController::class, 'search_city'])->name('admin.enterprises.create.search_city');
Route::put('/admin/config/{id}', [App\Http\Controllers\EnterpriseController::class, 'update'])->name('admin.config.update');

// rutas roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('admin.roles.show')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');

// rutas usuarios
Route::get('/admin/users', [App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index')->middleware('auth');
Route::get('/admin/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.users.create')->middleware('auth');
Route::post('/admin/users/create', [App\Http\Controllers\UserController::class, 'store'])->name('admin.users.store')->middleware('auth');
Route::get('/admin/users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('admin.users.show')->middleware('auth');
Route::get('/admin/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.users.edit')->middleware('auth');
Route::put('/admin/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.users.update')->middleware('auth');
Route::delete('/admin/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.users.destroy')->middleware('auth');

// rutas categorias
// rutas usuarios
Route::get('/admin/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.categories.index')->middleware('auth');
Route::get('/admin/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.categories.create')->middleware('auth');
Route::post('/admin/categories/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.categories.store')->middleware('auth');
Route::get('/admin/categories/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('admin.categories.show')->middleware('auth');
Route::get('/admin/categories/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.categories.edit')->middleware('auth');
Route::put('/admin/categories/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.categories.update')->middleware('auth');
Route::delete('/admin/categories/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.categories.destroy')->middleware('auth');

// rutas productos
Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index'])->name('admin.products.index')->middleware('auth');
Route::get('/admin/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('admin.products.create')->middleware('auth');
Route::post('/admin/products/create', [App\Http\Controllers\ProductController::class, 'store'])->name('admin.products.store')->middleware('auth');
Route::get('/admin/products/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('admin.products.show')->middleware('auth');
Route::get('/admin/products/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('admin.products.edit')->middleware('auth');
Route::put('/admin/products/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.products.update')->middleware('auth');
Route::delete('/admin/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('admin.products.destroy')->middleware('auth');

// rutas proveedores
// rutas productos
Route::get('/admin/suppliers', [App\Http\Controllers\SupplierController::class, 'index'])->name('admin.suppliers.index')->middleware('auth');
Route::get('/admin/suppliers/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('admin.suppliers.create')->middleware('auth');
Route::post('/admin/suppliers/create', [App\Http\Controllers\SupplierController::class, 'store'])->name('admin.suppliers.store')->middleware('auth');
Route::get('/admin/suppliers/{id}', [App\Http\Controllers\SupplierController::class, 'show'])->name('admin.suppliers.show')->middleware('auth');
Route::get('/admin/suppliers/{id}/edit', [App\Http\Controllers\SupplierController::class, 'edit'])->name('admin.suppliers.edit')->middleware('auth');
Route::put('/admin/suppliers/{id}', [App\Http\Controllers\SupplierController::class, 'update'])->name('admin.suppliers.update')->middleware('auth');
Route::delete('/admin/suppliers/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('admin.suppliers.destroy')->middleware('auth');

// rutas compras
Route::get('/admin/shopping', [App\Http\Controllers\ShoppingController::class, 'index'])->name('admin.shopping.index')->middleware('auth');
Route::get('/admin/shopping/create', [App\Http\Controllers\ShoppingController::class, 'create'])->name('admin.shopping.create')->middleware('auth');
Route::post('/admin/shopping/create', [App\Http\Controllers\ShoppingController::class, 'store'])->name('admin.shopping.store')->middleware('auth');
Route::get('/admin/shopping/{id}', [App\Http\Controllers\ShoppingController::class, 'show'])->name('admin.shopping.show')->middleware('auth');
Route::get('/admin/shopping/{id}/edit', [App\Http\Controllers\ShoppingController::class, 'edit'])->name('admin.shopping.edit')->middleware('auth');
Route::put('/admin/shopping/{id}', [App\Http\Controllers\ShoppingController::class, 'update'])->name('admin.shopping.update')->middleware('auth');
Route::delete('/admin/shopping/{id}', [App\Http\Controllers\ShoppingController::class, 'destroy'])->name('admin.shopping.destroy')->middleware('auth');

// rutas compras temporales
Route::post('/admin/shopping/create/tmp', [App\Http\Controllers\TempShopController::class, 'tmp_shoppings'])->name('admin.shopping.tmp_shoppings')->middleware('auth');
Route::delete('/admin/shopping/create/tmp/{id}', [App\Http\Controllers\TempShopController::class, 'destroy'])->name('admin.shopping.tmp_shoppings.destroy')->middleware('auth');
