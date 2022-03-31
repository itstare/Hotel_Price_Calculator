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

Route::get('/', [App\Http\Controllers\HotelController::class, 'index'])->middleware('auth')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HotelController::class, 'index'])->middleware('auth')->name('home');

Route::get('/hotel/create', [App\Http\Controllers\HotelController::class, 'create'])->middleware('auth')->name('hotel.create');
Route::post('/hotel/input', [App\Http\Controllers\HotelController::class, 'input'])->middleware('auth')->name('hotel.input');
Route::get('/hotel/{id}/edit', [App\Http\Controllers\HotelController::class, 'edit'])->middleware('auth')->name('hotel.edit');
Route::post('/hotel/{id}/update', [App\Http\Controllers\HotelController::class, 'update'])->middleware('auth')->name('hotel.update');
Route::get('/hotel/{id}/delete', [App\Http\Controllers\HotelController::class, 'delete'])->middleware('auth')->name('hotel.delete');
Route::get('/hotel/search-by-location', [App\Http\Controllers\HotelController::class, 'searchByLocation'])->middleware('auth')->name('hotel.search.location');
Route::post('hotel/search-by-location/query', [App\Http\Controllers\HotelController::class, 'searchByLocationQuery'])->middleware('auth')->name('hotel.search.location.query');
Route::post('hotel/search', [App\Http\Controllers\HotelController::class, 'searchEngine'])->middleware('auth')->name('hotel.search');

Route::get('/price/{hotelId}/create', [App\Http\Controllers\PriceController::class, 'create'])->middleware('auth')->name('price.create');
Route::post('/price/{hotelId}/input', [App\Http\Controllers\PriceController::class, 'input'])->middleware('auth')->name('price.input');
Route::get('/price/{hotelId}/view', [App\Http\Controllers\PriceController::class, 'index'])->middleware('auth')->name('price.view');
Route::get('/price/{id}/edit', [App\Http\Controllers\PriceController::class, 'edit'])->middleware('auth')->name('price.edit');
Route::post('/price/{id}/update', [App\Http\Controllers\PriceController::class, 'update'])->middleware('auth')->name('price.update');
Route::get('/price/{id}/delete', [App\Http\Controllers\PriceController::class, 'delete'])->middleware('auth')->name('price.delete');