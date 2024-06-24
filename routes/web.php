<?php

use Illuminate\Support\Facades\Route;
use Tcg\Voyager\Facades\Voyager;
use App\Http\Controllers\RestosController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\EspaceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;



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
Route::get('/hotel', [App\Http\Controllers\HotelController::class,'index']);
Route::get('/hotel/{id}', [App\Http\Controllers\HotelController::class, 'show'])->name('hotels.show');
Route::get('/restos/{id}', [RestosController::class, 'show'])->name('restos.show');
Route::get('/site/{id}', [SiteController::class, 'show'])->name('sites.show');
Route::get('/espace/{id}', [EspaceController::class, 'show'])->name('space.show');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');


Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route pour la vue avancée
Route::get('/avance', function () {
    return view('avance'); 
})->name('avance')->middleware('auth');

Route::get('/welcome', [App\Http\Controllers\Controller::class, 'index'])->name('welcome');

Route::get('/chargement', function () {
    return view('chargement');
})->name('chargement');

Route::get('/', function () {
    return redirect()->route('chargement');
});
Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::get('/mapsite', [App\Http\Controllers\MapController::class, 'indexsite'])->name('mapsite');
Route::get('/map/{id}', [App\Http\Controllers\MapController::class, 'show'])->name('map.show');
Route::get('/mapsite/{id}', [App\Http\Controllers\MapController::class, 'showSite'])->name('mapsite.showSite');
Route::get('/mapespace', [App\Http\Controllers\MapController::class, 'indexspace'])->name('mapespace');
Route::get('/mapespace/{id}', [App\Http\Controllers\MapController::class, 'showSpace'])->name('mapspace.showSpace');
Route::get('/mapevent', [App\Http\Controllers\MapController::class, 'indexevent'])->name('mapevent');
Route::get('/mapevent/{id}', [App\Http\Controllers\MapController::class, 'showEvent'])->name('mapevent.showEvent');
Route::get('/maphotel', [App\Http\Controllers\MapController::class, 'indexhotel'])->name('maphotel');
Route::get('/maphotel/{id}', [App\Http\Controllers\MapController::class, 'showhotel'])->name('maphotel.showhotel');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


