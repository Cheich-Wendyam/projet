<?php

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

Route::get('/', [App\Http\Controllers\Controller::class, 'index']);
Route::get('/layout', [App\Http\Controllers\Controller::class, 'layout']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/espace', [App\Http\Controllers\EspaceController::class, 'index']);
Route::get('/site', [App\Http\Controllers\SiteController::class, 'index']);
Route::get('/restos', [App\Http\Controllers\RestosController::class,'index']);
