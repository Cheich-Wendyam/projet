<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Voyager;
use App\Http\Controllers\RestosController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\EspaceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SearchController;

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
Route::get('map', [App\Http\Controllers\MapController::class, 'index']);
Route::get('/espace', [App\Http\Controllers\EspaceController::class, 'index']);
Route::get('/site', [App\Http\Controllers\SiteController::class, 'index']);
Route::get('/restos', [App\Http\Controllers\RestosController::class,'index']);
Route::get('/event', [App\Http\Controllers\EventController::class,'index']);
Route::get('/restos/{id}', [RestosController::class, 'show'])->name('restos.show');
Route::get('/site/{id}', [SiteController::class, 'show'])->name('sites.show');
Route::get('/espace/{id}', [EspaceController::class, 'show'])->name('space.show');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');


Route::get('/search', [SearchController::class, 'search'])->name('search');

