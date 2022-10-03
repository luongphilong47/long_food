<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
    return view('welcome');
});

Route::get('/Hello', function () {
    return view('Hello');
});

Route::get('/World', [PageController::class, 'World']);

Route::get('/car-detail/{car}',[CarController::class, 'show']);

Route::get('/hello2',[PageController::class, 'hello']);

Route::resource('cars',CarController::class);
//Route này tương đương với 7 route:
// Route::get('cars',[CarController::class,'index'])->name('cars.index');
// Route::get('cars/create',[CarController::class,'create'])->name('cars.create');
// Route::post('cars',[CarController::class,'store'])->name('cars.store');
// Route::get('cars/{id}',[CarController::class,'show'])->name('cars.show');
// Route::get('cars/{id}/edit',[CarController::class,'edit'])->name('cars.edit');
// Route::put('cars/{id}',[CarController::class,'update'])->name('cars.update');
// Route::delete('cars/{id}',[CarController::class,'destroy'])->name('cars.destroy');
