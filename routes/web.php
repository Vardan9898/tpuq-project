<?php

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PropertiesController;
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
Route::get('/', function () {
    return view('home');
});

require __DIR__ . '/auth.php';

//properties
Route::get('properties', [PropertiesController::class, 'index'])->name('properties.index');
Route::group(['middleware' => ['auth']], function () {
    Route::get('properties/create', [PropertiesController::class, 'create'])->name('properties.create');
    Route::post('properties', [PropertiesController::class, 'store']);
    Route::get('properties/{property}/edit', [PropertiesController::class, 'edit'])->name('properties.edit');
    Route::patch('properties/{property}', [PropertiesController::class, 'update']);
    Route::delete('properties/{property}', [PropertiesController::class, 'destroy']);
});
Route::get('properties/{property}', [PropertiesController::class, 'show'])->name('properties.show');

//tenants
Route::group(['middleware' => ['auth']], function () {
    Route::get('tenants', [TenantsController::class, 'index'])->name('tenants.index');
    Route::get('tenants/create', [TenantsController::class, 'create'])->name('tenants.create');
    Route::post('tenants', [TenantsController::class, 'store']);
    Route::get('tenants/{tenant}/edit', [TenantsController::class, 'edit'])->name('tenants.edit');
    Route::patch('tenants/{tenant}', [TenantsController::class, 'update']);
    Route::delete('tenants/{tenant}', [TenantsController::class, 'destroy']);
});

//tenancy
Route::group(['middleware' => ['auth']], function () {
    Route::get('tenancies', [TenanciesController::class, 'index'])->name('tenancies.index');
    Route::get('tenancies/{property}/create', [TenanciesController::class, 'create'])->name('tenancies.create');
    Route::post('tenancies/{property}', [TenanciesController::class, 'store']);
    Route::get('tenancies/{tenancy}/edit', [TenanciesController::class, 'edit'])->name('tenancies.edit');
    Route::patch('tenancies/{tenancy}', [TenanciesController::class, 'update']);
    Route::delete('tenancies/{tenancy}', [TenanciesController::class, 'destroy']);
});

//profile
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile/{id}', [ProfilesController::class, 'show'])->name('profile.show');
    Route::patch('profile/{id}', [ProfilesController::class, 'update'])->name('profile.update');
});
