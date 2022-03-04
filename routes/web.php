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
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//session
Route::get('login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//properties
Route::group(['middleware' => ['auth']], function () {
    Route::get('properties/create', [PropertiesController::class, 'create']);
    Route::post('properties/create', [PropertiesController::class, 'store']);
    Route::get('properties/{property}/edit', [PropertiesController::class, 'edit']);
    Route::patch('properties/{property}/edit', [PropertiesController::class, 'update']);
    Route::delete('properties/{property}/edit', [PropertiesController::class, 'destroy']);
});
Route::get('properties', [PropertiesController::class, 'index']);
Route::get('properties/{property:id}', [PropertiesController::class, 'show']);

//tenants
Route::group(['middleware' => ['auth']], function () {
    Route::get('/tenants', [TenantsController::class, 'index']);
    Route::get('tenants/create', [TenantsController::class, 'create']);
    Route::post('tenants/create', [TenantsController::class, 'store']);
    Route::get('tenants/{tenant}/edit', [TenantsController::class, 'edit']);
    Route::patch('tenants/{tenant}/edit', [TenantsController::class, 'update']);
    Route::delete('tenants/{tenant}/edit', [TenantsController::class, 'destroy']);
});

//Tenancy
Route::group(['middleware' => ['auth']], function () {
    Route::get('/tenancies', [TenanciesController::class, 'index']);
    Route::get('/tenancies/{property}/create', [TenanciesController::class, 'create']);
    Route::post('/tenancies/{property}/create', [TenanciesController::class, 'store']);
    Route::delete('/tenancies/{tenancy}/delete', [TenanciesController::class, 'destroy']);
    Route::get('/tenancies/{tenancy}/edit', [TenanciesController::class, 'edit']);
    Route::patch('/tenancies/{tenancy}/edit', [TenanciesController::class, 'update']);
    Route::delete('/tenancies/{tenancy}', [TenanciesController::class, 'destroy']);
});

