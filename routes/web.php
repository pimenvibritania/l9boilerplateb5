<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\General\RoleController;
use App\Http\Controllers\HomeController;

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
Route::middleware('web')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::resource('/roles', RoleController::class);
    Route::get('/roles-data', [RoleController::class, 'datatable'])->name('roles.datatable');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

});
