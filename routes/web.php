<?php

use App\Http\Controllers\General\UserController;
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
    Route::get('/template', function () {
        return view('template');
    });
    Auth::routes();

    Route::resource('/roles', RoleController::class)->except('create');
    Route::get('/roles-data', [RoleController::class, 'datatable'])->name('roles.datatable');

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/users', UserController::class);
});
