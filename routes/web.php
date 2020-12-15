<?php
use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Auth::routes(['register'=>false,'verify'=>false,'reset'=>true]);

Route::resource('categorias',\App\Http\Controllers\CategoriaController::class)->middleware('auth');
Route::resource('unidadmedidas',\App\Http\Controllers\UnidadMedidaController::class)->middleware('auth');
Route::resource('productos',\App\Http\Controllers\ProductoController::class)->middleware('auth');
Route::resource('clientes',\App\Http\Controllers\ClienteController::class)->middleware('auth');
Route::resource('ventas',\App\Http\Controllers\VentaController::class)->middleware('auth');
Route::resource('users',\App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('roles',\App\Http\Controllers\RoleController::class)->middleware('auth');
Route::get('/user/{user}/reset', [App\Http\Controllers\UserController::class, 'showUpdatePasswordForm'])->name('users.reset');
Route::post('/user/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('users.password');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
