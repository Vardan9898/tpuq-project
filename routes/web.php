<?php

use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TenanciesController;
use App\Http\Controllers\TenantsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//register
Route::get('/', [RegisterController::class, 'index'])->middleware('guest')->name('home');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//session
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');

//properties
Route::group(['middleware' => ['auth']], function () {
    Route::get('properties/create', [PropertiesController::class, 'create'])->name('properties.create');
    Route::post('properties/store', [PropertiesController::class, 'store']);
    Route::get('properties/{property}/edit', [PropertiesController::class, 'edit'])->name('properties.edit');
    Route::patch('properties/{property}/update', [PropertiesController::class, 'update']);
    Route::delete('properties/{property}/delete', [PropertiesController::class, 'destroy']);
});
Route::get('properties', [PropertiesController::class, 'index'])->name('properties');
Route::get('properties/{property:id}', [PropertiesController::class, 'show'])->name('properties.show');

//tenants
Route::group(['middleware' => ['auth']], function () {
    Route::get('tenants', [TenantsController::class, 'index'])->name('tenants');
    Route::get('tenants/create', [TenantsController::class, 'create'])->name('tenants.create');
    Route::post('tenants/store', [TenantsController::class, 'store']);
    Route::get('tenants/{tenant}/edit', [TenantsController::class, 'edit'])->name('tenants.edit');
    Route::patch('tenants/{tenant}/update', [TenantsController::class, 'update']);
    Route::delete('tenants/{tenant}/delete', [TenantsController::class, 'destroy']);
});

//tenancy
Route::group(['middleware' => ['auth']], function () {
    Route::get('tenancies', [TenanciesController::class, 'index'])->name('tenancies');
    Route::get('tenancies/{property}/create', [TenanciesController::class, 'create'])->name('tenancies.create');
    Route::post('tenancies/{property}/store', [TenanciesController::class, 'store']);
    Route::delete('tenancies/{tenancy}/delete', [TenanciesController::class, 'destroy']);
    Route::get('tenancies/{tenancy}/edit', [TenanciesController::class, 'edit'])->name('tenancies.edit');
    Route::patch('tenancies/{tenancy}/update', [TenanciesController::class, 'update']);
});

